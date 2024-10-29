<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Recharge;
use App\Models\User;
use App\Models\Purchase;
use App\Models\Package;
use App\Models\UserLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class AdminController extends Controller
{
    
    public function findAndReplaceDuplicateRefIds()
    {
        // Find duplicate ref_id values
        $duplicates = DB::table('users')
            ->select('ref_id', DB::raw('COUNT(*) as count'))
            ->groupBy('ref_id')
            ->having('count', '>', 1)
            ->get();
            

        // Replace duplicates with unique ref_id values
        foreach ($duplicates as $duplicate) {
            // Find all records with this ref_id
            $users = DB::table('users')->where('ref_id', $duplicate->ref_id)->get();

            // Skip the first record, since it will keep the original ref_id
            $skipFirst = true;
            foreach ($users as $user) {
                if ($skipFirst) {
                    $skipFirst = false;
                    continue;
                }

                // Generate a new unique ref_id
                $newRefId = $this->generateUniqueRefId();

                // Update the record with the new unique ref_id
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['ref_id' => $newRefId]);
            }
        }

        // Add unique constraint to ref_id column
        DB::statement('ALTER TABLE users ADD UNIQUE (ref_id)');
        
        return 'success';
    }
    
    private function generateUniqueRefId()
    {
        // Generate a unique ref_id using a UUID
        do {
            $newRefId = mt_rand(111111, 999999);
        } while (DB::table('users')->where('ref_id', $newRefId)->exists());

        return $newRefId;
    }
    
    public function interest(){
       
        Purchase::where('status', 'inactive')->where('final_status','0')->chunk(1000, function ($purchases){
            foreach ($purchases as $purchase){
                $user = User::where('id', $purchase->user_id)->first();
                if ($user){
                    $package = Package::where('id', $purchase->package_id)->first();
                    if ($package){

                        $amount = $user->balance + $purchase->daily_income;
                        $user->balance = $amount;
                        $user->save();

                        $purchase->date = now()->addHours(24);
                        $purchase->save();


                        $ledger = new UserLedger();
                        $ledger->user_id = $user->id;
                        $ledger->reason = 'my_commission';
                        $ledger->perticulation = 'Package Commission added.';
                        $ledger->amount = $purchase->daily_income;
                        $ledger->debit = $purchase->daily_income;
                        $ledger->status = 'approved';
                        $ledger->step = 'first';
                        $ledger->date = date('d-m-Y H:i');
                        $ledger->save();

                        Purchase::where('id', $purchase->id)->update(['final_status'=> '1']);
                    }
                }
            }
        });
        
        Purchase::where('status', 'active')->chunk(1000, function ($purchases){
            foreach ($purchases as $purchase){
                $user = User::where('id', $purchase->user_id)->first();
                if ($user){
                    $package = Package::where('id', $purchase->package_id)->first();
                    if ($package){

                        if (now()->greaterThanOrEqualTo($purchase->date)){
                            $amount = $user->balance + $purchase->daily_income;
                            $user->balance = $amount;
                            $user->save();

                            $purchase->date = now()->addHours(24);
                            $purchase->save();


                            $ledger = new UserLedger();
                            $ledger->user_id = $user->id;
                            $ledger->reason = 'my_commission';
                            $ledger->perticulation = 'Package Commission added.';
                            $ledger->amount = $purchase->daily_income;
                            $ledger->debit = $purchase->daily_income;
                            $ledger->status = 'approved';
                            $ledger->step = 'first';
                            $ledger->date = date('d-m-Y H:i');
                            $ledger->save();
                        }


                        $checkExpire = new \Carbon\Carbon($purchase->validity);
                        if ($checkExpire->isPast()){
                            Purchase::where('id', $purchase->id)->update(['status'=> 'inactive']);
                        }
                    }
                }
            }
        });
    }


    public function index_recharge(){
        $datas = Recharge::orderByDesc('id')->get();
        return view('admin.pages.list', compact('datas'));
    }

    public function index_recharge_status(Request $request, $id){
        $data = Recharge::where('id', $id)->first();
        if ($request->status == 'rejected'){
            $user = User::where('id', $data->user_id)->first();
            $user->balance = $user->balance + $data->amount;
            $user->save();
        }

        $data->status = $request->status;
        $data->save();
        return redirect()->back()->with('success', 'Status changed successful.');
    }


    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function login_submit(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();
            if ($admin->type == 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Logged In Successful.');
            } else {
                return error_redirect('admin.login', 'error', 'Admin Credentials Very Secured Please Don"t try Again.');
            }
        } else {
            return error_redirect('admin.login', 'error', 'Admin Credentials Does Not Match.');
        }
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->with('success', 'Logged out successful.');
        } else {
            return error_redirect('admin.login', 'error', 'You are already logged out.');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile.index');
    }

    public function profile_update()
    {
        $admin = Admin::first();
        return view('admin.profile.update-details', compact('admin'));
    }

    public function profile_update_submit(Request $request)
    {
        $admin = Admin::find(1);
        $path = uploadImage(false, $request, 'photo', 'admin/assets/images/profile/', $admin->photo);
        $admin->photo = $path ?? $admin->photo;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->update();
        return redirect()->route('admin.profile.update')->with('success', 'Admin profile updated.');
    }

    public function change_password()
    {
        $admin = admin()->user();
        return view('admin.profile.change-password', compact('admin'));
    }

    public function check_password(Request $request)
    {
        $admin = admin()->user();
        $password = $request->password;
        if (Hash::check($password, $admin->password)) {
            return response()->json(['message' => 'Password matched.', 'status' => true]);
        } else {
            return response()->json(['message' => 'Password dose not match.', 'status' => false]);
        }
    }

    public function change_password_submit(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required'
        ]);
        if ($validate->fails()) {
            session()->put('errors', true);
            return redirect()->route('admin.changepassword')->withErrors($validate->errors());
        }

        $admin = admin()->user();
        $password = $request->old_password;
        if (Hash::check($password, $admin->password)) {
            if (strlen($request->new_password) > 5 && strlen($request->confirm_password) > 5){
                if ($request->new_password === $request->confirm_password) {
                    $admin->password = Hash::make($request->new_password);
                    $admin->update();
                    return redirect()->route('admin.changepassword')->with('success', 'Password changed successfully');
                } else {
                    return error_redirect('admin.changepassword', 'error', 'New password and confirm password dose not match');
                }
            }else{
                return error_redirect('admin.changepassword', 'error',  'Password must be greater then 6 or equal.');
            }
        } else {
            return error_redirect('admin.changepassword', 'error',  'Password dose not match');
        }
    }
}
