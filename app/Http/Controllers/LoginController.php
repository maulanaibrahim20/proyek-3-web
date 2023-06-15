<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            Alert::error('Login Gagal', 'Akun tidak terdaftar');
            return back()->with('loginerror', 'akun tidak terdaftar/email salah');
        }
        if (!Hash::check($request->password, $user->password)) {
            Alert::error('Login Gagal', 'Password salah');
            return back()->with('loginerror', 'password salah');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            Alert::success('Selamat datang! Anda berhasil login');
            return redirect('index');
        }
    }

    public function logout()
    {
        Auth::logout();
        Alert::success('Login', 'Selamat datang! Anda berhasil login')->autoclose(3000);
        return redirect('/');
    }
}
