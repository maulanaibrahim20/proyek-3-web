<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Web\UserMobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return response()->json(
                [
                    "pesan" => "Akun Tidak Terdaftar"
                ],
                404
            );
        }

        $cekPassword = Hash::check($request->password, $user->password);

        if (!$cekPassword) {
            return response()->json(
                [
                    "pesan" => "Password Salah"
                ],
                404
            );
        }

        $token = $user->createToken("api", [$user->name]);

        Auth::login($user);

        $user["token"] = $token->plainTextToken;

        return response()->json(["message" => "Berhasil Login", "data" => $user]);
    }
}
