<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ['doctor' => Doctor::all()];
        return view('pages.doctor', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $doctor = new Doctor();

        $doctor->name = $request->name;
        $doctor->poli = $request->poli;
        $doctor->lulusan = $request->lulusan;
        $doctor->jenis_kelamin = $request->jk;
        $doctor->no_str = $request->nostr;
        $doctor->save();

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
        Doctor::where("id", $id)->update([
            "name" => $request->name,
            "poli" => $request->poli,
            "lulusan" => $request->lulusan,
            "no_str" => $request->nostr,
            "jenis_kelamin" => $request->jk,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::where("id", $id)->first();

        $doctor->delete();

        return back();
    }
}