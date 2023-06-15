<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\Web\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $data = News::paginate(3);
            return NewsResource::collection($data);
        });
    }

    public function allnews()
    {
        return DB::transaction(function () {
            $data = News::all();
            return NewsResource::collection($data);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {

            if ($request->file("image")) {
                $data = $request->file("image")->store("image_news");
            }

            News::create([
                "title" => $request->title,
                "description" => $request->description,
                "created_at" => $request->created_at,
                "image" => url("storage/" . $data)
            ]);
            return response()->json(["pesan" => "Data News/Berita Berhasil Ditambahkan"]);
        });
    }

    public function edit($id)
    {
        return DB::transaction(function () use ($id) {
            $id = News::where("id", $id)->first();

            return new NewsResource($id);
        });
    }

    public function update(Request $request, $id)
    {
        return DB::transaction(function () use ($id, $request) {
            if ($request->file("image")) {

                if ($request->ImageOld) {
                    Storage::delete($request->ImageOld);
                }

                $ImageName = $request->file("image")->store("image_news");

                $data = url('') . "/storage/" . $request->ImageOld;
            } else {
                $data = url('') . "/storage/" . $request->ImageOld;
            }
        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $news = News::where("id", $id)->first();

            $data = str_replace(url('storage/'), "", $news->image);
            Storage::delete($data);

            $news->delete();

            return response()->json(["pesan" => "Data Berita Berhasil Dihapus"]);
        });
    }
}
