<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\HospitalResource;
use App\Models\Web\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HospitalController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $data = Hospital::get();
            return HospitalResource::collection($data);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {

            if ($request->file("image")) {
                $data = $request->file("image")->store("image_hospital");
            }

            Hospital::create([
                "name" => $request->name,
                "address" => $request->address,
                "image" => url("storage/" . $data)
            ]);
            return response()->json(["pesan" => "Data Hospital Berhasil Ditambahkan"]);
        });
    }

    public function counting()
    {
        return DB::transaction(function () {
            $data = [
                "hospital" => Hospital::count()
            ];
            return response()->json(["jumlah_data" => [$data]]);
        });
    }
}
