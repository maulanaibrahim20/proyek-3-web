<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpesialisResource;
use App\Models\Web\Spesialis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpesialisController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $data = Spesialis::get();
            return SpesialisResource::collection($data);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            Spesialis::create([
                "id" => $request->id,
                "spesialis" => $request->spesialis,
            ]);
            return response()->json(["pesan" => "Data Spesialis Berhasil Ditambahkan"]);
        });
    }
}
