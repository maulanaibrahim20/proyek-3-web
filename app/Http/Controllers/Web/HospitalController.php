<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\Hospital;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ['hospital' => Hospital::all()];
        return view('pages.hospital', $data);
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
        $hospital = new Hospital();

        $hospital->name = $request->name;
        $hospital->address = $request->address;

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images_hospital'), $imageName);
        $hospital->image = $imageName;

        if ($hospital->save()) {
            return redirect()->back()->with('success', 'Data Rumah Sakit yang Anda masukkan berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data Rumah Sakit. Silakan coba lagi.');
        }
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
        $hospital = Hospital::find($id);

        if (!$hospital) {
            Alert::error('Error', 'Data not found.')->autoclose(3000);
            return back();
        }

        $hospital->name = $request->name;
        $hospital->address = $request->address;

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Hapus foto lama jika ada
            $oldImageName = $hospital->image;
            if ($oldImageName) {
                $fotoPath = public_path('images_hospital/' . $oldImageName);
                if (File::exists($fotoPath)) {
                    File::delete($fotoPath);
                }
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images_hospital'), $imageName);
            $hospital->image = $imageName;
        }

        if ($hospital->save()) {
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
        $hospital = Hospital::where("id", $id)->first();

        // Simpan nama file foto sebelum dihapus
        $imageName = $hospital->image;

        $fotoPath = public_path('images_hospital/' . $imageName);

        $hospital->delete();

        // Hapus foto jika data berhasil dihapus
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }

        // Tampilkan SweetAlert setelah data berhasil dihapus
        Alert::success('Sukses', 'Data yang Anda masukkan berhasil diperbaharui')->autoclose(3000);

        return back();
    }
}
