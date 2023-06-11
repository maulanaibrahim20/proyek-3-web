<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Web\Admin;
use App\Models\Web\UserMobile;
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
            "id" => $request->id,
            "name" => $request->name,
            "email" => $request->email,
            "profession" => $request->profession,
            "password" => bcrypt($request->password)
        ]);

        return response()->json(["pesan" => "Akun Berhasil di Daftarkan"]);
    }
}
