<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Checkin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request, $id = null)
    {
        // Cek jika platform belum diluncurkan
        if (!config('app.platform_launched')) {
            return back()->with('error', 'Website akan segera rilis');
        }

        if ($id) {
            User::find($id)->delete();
        }

        $ref_by = $request->query('inviteCode');

        return view('app.auth.registration', compact('ref_by'));
    }



    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $messages = [
            'phone.required' => 'Nomor HP wajib diisi.',
            'phone.unique' => 'Nomor HP sudah terdaftar.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 6 karakter.',
            'phone.min' => 'Nomor HP minimal 6 angka.',
            'confirm_password.required' => 'Konfirmasi kata sandi wajib diisi.',
            'verification.required' => 'Kode verifikasi wajib diisi.',
        ];

        $validate = Validator::make($request->all(), [
            'phone' => ['required', 'unique:users,phone','min:6'],
            'password' => ['required', 'min:6'],
            'confirm_password' => ['required'],
            'ref_by' => ['nullable'],
            'verification' => ['required'],
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        if ($request->confirm_password != $request->password) {
            return redirect()->back()->with('error', 'Konfirmasi kata sandi salah.');
        }

        $checkPhone = User::where('phone', $request->phone)->first();
        if ($checkPhone) {
            return redirect()->back()->with('error', 'Nomor HP sudah terdaftar.');
        }

        $ref_by = User::where('ref_id', $request->ref_by)->first();
        $user = User::create([
            'name' => 'u' . $request->phone,
            'username' => env('APP_NAME'),
            'ref_id' => rand(111111, 999999),
            'ref_by' => $ref_by ? $ref_by->id : null,
            'email' => 'user' . rand(0, 999999) . Str::random(2) . '@gmail.com',
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'type' => 'user',
            'balance' => 10000,
            'code' => $request->code,
            'remember_token' => Str::random(30),
        ]);

        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan.');
        }
    }
}
