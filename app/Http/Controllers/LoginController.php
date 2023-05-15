<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return back()->with('loginerror', 'akun tidak terdaftar/email salah');
        }
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('loginerror', 'password salah');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('index');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
