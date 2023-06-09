<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource;
use App\Models\Web\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $query = Doctor::query();

            if ($request->has('id_spesialis')) {
                $query->where('id_spesialis', $request->id_spesialis);
            }

            $data = $query->paginate($request->per_page);
            return DoctorResource::collection($data);
        });
    }

    public function alldoctor()
    {
        return DB::transaction(function () {
            $data = Doctor::all();
            return DoctorResource::collection($data);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {

            if ($request->file("image")) {
                $data = $request->file("image")->store("image_doctor");
            }

            Doctor::create([
                "id_hospital" => $request->id_hospital, //key value "id_hospital adalah nama yang ada di database"
                "id_spesialis" => $request->id_spesialis, //key value "id_hospital adalah nama yang ada di database"
                "name" => $request->name,
                "poli" => $request->poli,
                "lulusan" => $request->lulusan,
                "no_str" => $request->no_str,
                "jenis_kelamin" => $request->jenis_kelamin,
                "image" => url("storage/" . $data)
            ]);
            return response()->json(["pesan" => "Data Doctor Berhasil Ditambahkan"]);
        });
    }
}
