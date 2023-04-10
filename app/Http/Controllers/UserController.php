<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();

        return UserResource::collection($data);
    }

    public function store(Request $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "profession" => $request->profession,
            "password" => bcrypt("password123")
        ]);

        return response()->json(["pesan" => "Akun Berhasil di Daftarkan"]);
    }
}
