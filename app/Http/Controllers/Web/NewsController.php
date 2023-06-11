<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\News;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ['news' => News::all()];
        return view('pages.news', $data);
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
        $news = new News();

        $news->title = $request->title;
        $news->description = $request->description;

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images_news'), $imageName);
        $news->image = $imageName;


        // $news->save();
        if ($news->save()) {
            Alert::success('Success', 'Data has been successfully added.')->autoclose(3000);
        } else {
            Alert::error('Error', 'Failed to add data.')->autoclose(3000);
        }
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
        $news = News::find($id);

        if (!$news) {
            Alert::error('Error', 'Data not found.')->autoclose(3000);
            return back();
        }

        $news->title = $request->title;
        $news->description = $request->description;

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Hapus foto lama jika ada
            $oldImageName = $news->image;
            if ($oldImageName) {
                $fotoPath = public_path('images_news/' . $oldImageName);
                if (File::exists($fotoPath)) {
                    File::delete($fotoPath);
                }
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images_news'), $imageName);
            $news->image = $imageName;
        }

        if ($news->save()) {
            Alert::success('Success', 'Data has been successfully updated.')->autoclose(3000);
        } else {
            Alert::error('Error', 'Failed to update data.')->autoclose(3000);
        }

        return back();
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::where("id", $id)->first();

        // Simpan nama file foto sebelum dihapus
        $imageName = $news->image;

        $fotoPath = public_path('images_news/' . $imageName);

        $news->delete();

        // Hapus foto jika data berhasil dihapus
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }

        // Tampilkan SweetAlert setelah data berhasil dihapus
        Alert::success('Sukses', 'Data yang Anda masukkan berhasil diperbaharui')->autoclose(3000);

        return back();
    }
}
