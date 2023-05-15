<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Web\UserMobile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ['users' => UserMobile::all()];
        return view('pages.user', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new UserMobile();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profession = $request->profession;
        $user->password = bcrypt("password123");

        $user->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        UserMobile::where("id", $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "profession" => $request->profession,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = UserMobile::where("id", $id)->first();

        $user->delete();

        return back();
    }
}
