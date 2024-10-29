<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create()
    {
        // Cek jika platform belum diluncurkan
        if (!config('app.platform_launched')) {
            return back()->with('error', 'Website akan segera rilis');
        }

        return view('app.auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    
     public function verifyOtp(Request $request) {
        // return back()->with('error', 'Website akan segera rilis');
        $request->validate(
            [
                'otp' => "required|min:6",
            ],
            [
                'otp.required' => "Harap isi kode OTP",
                'otp.min' => "Minimal 6 karakter",
            ]
        );

        $phone = session()->get('phone');
        $otp = $request->input('otp');

        $user = User::where('phone', $phone)->first();
        if(!$user)
        {
            return redirect()->back()->with('error', 'Nomor tidak terdaftar');
        }


        // Retrieve the stored OTP hash and its creation time from the database.
        $storedOtpData = DB::table('password_resets')->where('phone', $phone)->first();

        if (!$storedOtpData) {
            return redirect()->back()->with('error', 'Harap kirim kode OTP ');
        }


        // Check if the OTP matches and is not expired (e.g., within 5 minutes).
        if ($otp == $storedOtpData->otp) {
            return redirect()->route('reset-password-form')->with('success', 'OTP berhasil diverifikasi');
        } else {
            return redirect()->back()->with('error', 'Kode OTP salah');
        }
    }


    public function verifyOtpForm(Request $request) {
        $phone = session()->get('phone');
        if($phone)
        {
            return view('app.auth.verify-otp');
        }
        abort(404);
    }

    public function resetPasswordForm(Request $request) {
        $phone = session()->get('phone');
        if($phone)
        {
            return view('app.auth.change_password');
        }
        abort(404);
    }


    public function store(Request $request)
    {
        
        // Block Forget 
        // return back()->with('message', 'Aplikasi akan segera rilis');
        // Block Forget 
        
        $request->validate(
            [
                'phone' => "required|min:6|max:14",
            ],
            [
                'phone.required' => "Harap isi nomor HP",
                'phone.min' => "Nomor HP minimal 6 digit angka",
                'phone.max' => "Nomor HP maksimal 15 digit angka",
            ]
        );
        
        $phone = $request->input('phone');

        $user = User::where('phone', $phone)->first();
        if(!$user)
        {
            return redirect()->back()->with('error', 'Nomor HP tidak terdaftar');
        }

        session()->put('phone', $phone);

        $otp = mt_rand(100000, 999999);

        DB::table('password_resets')->updateOrInsert(
            ['phone' => $request->input('phone')],
            ['otp' => $otp, 'created_at' => now()]
        );
        
        $params = array(
            'token' => '1f785987f58308609d4a2f5138e6e74a',
            'to' => $request->phone,
            'msg' => "Harap masukan kode OTP berikut : ".$otp." "
        );

        $response = Http::withoutVerifying()
                ->withOptions(["verify" => false])
                ->get("https://websms.co.id/api/smsgateway-otp", $params);
        
        if($response->status() == 200 && $response->object()->status == "success"){
            return redirect()->route('verify-otp-form')->with('success', 'Kode OTP berhasil dikirim');
        }else{
            return back()->with('error', 'Kode OTP gagal dikirim');
        }
    }


    public function resetPassword(Request $request) {
        $request->validate(
            [
                'password' => "required|min:6|max:20|confirmed"
            ],
            [
                'password.required' => "Harap isi password",
                'password.min' => "password minimal 6 karakter",
                'password.max' => "password maksimal 20 karakter",
                'password.confirmed' => "Konfirmasi password salah",
            ]
        );

        $phone = session()->get('phone');
        $password = $request->input('password');


        $user = User::where('phone', $phone)->first();

        if($user)
        {
            $user->password = Hash::make($password);
            $user->save();

            // Clear the OTP record from the database.
            DB::table('password_resets')->where('phone', $phone)->delete();

            Auth::attempt(['phone' => $phone, 'password' => $password]);
            return redirect()->route('dashboard')->with('success','password baru berhasil diubah');
        }
        else
        {
            return back()->with('error','Perubahan password gagal, silahkan coba kembali');
        }
    }
}
