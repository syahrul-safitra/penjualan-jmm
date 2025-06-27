<?php

namespace App\Http\Controllers;

use App\Models\Clothing;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;


class ClothingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Clothes.index', [
            'clothes' => Clothing::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Clothes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:200|unique:clothing', 
            'harga' => 'required|numeric', 
            'jumlah' => 'required|numeric',
            'deskripsi' => 'required|max:200',
            'gambar_depan' => 'required|max:2050', 
            'gambar_belakang' => 'required|max:2050', 
        ]);

        $file1 = $request->file('gambar_depan');

        $renameFile1 = uniqid() . '_' . $file1->getClientOriginalName();

        $validated['gambar_depan'] = $renameFile1;

        $tujuan_upload = 'file';

        $file1->move($tujuan_upload, $renameFile1);


        $file2 = $request->file('gambar_belakang');

        $renameFile2 = uniqid() . '_' . $file2->getClientOriginalName();

        $validated['gambar_belakang'] = $renameFile2;

        $file2->move($tujuan_upload, $renameFile2);

        // Create data : 
        Clothing::create($validated);

        return redirect('/clothes')->with('success', 'Berhasil menginput pakaian');

    }

    /**
     * Display the specified resource.
     */
    public function show(Clothing $clothes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clothing $clothes)
    {
        return view('Admin.Clothes.edit', [
            'clothes' => $clothes 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clothing $clothes)
    {
        $rules = [
            'harga' => 'required|numeric', 
            'jumlah' => 'required|numeric',
            'deskripsi' => 'required|max:200',
            'gambar_depan' => 'max:2050', 
            'gambar_belakang' => 'max:2050',
        ];

        if($request->nama != $clothes->nama) {
            $rules['nama'] = 'required|max:200|unique:clothing';
        }

        $validated = $request->validate($rules);

        $location = 'file';
        if ($request->file('gambar_depan')) {
            $file1 = $request->file('gambar_depan');

            $rename = uniqid() . '_' . $file1->getClientOriginalName();

            $validated['gambar_depan'] = $rename;

            File::delete('file/' . $clothes->gambar_depan);

            $file1->move($location, $rename);
        }

        if ($request->file('gambar_belakang')) {
            $file2 = $request->file('gambar_belakang');

            $rename = uniqid() . '_' . $file2->getClientOriginalName();

            $validated['gambar_belakang'] = $rename;

            File::delete('file/' . $clothes->gambar_belakang);

            $file2->move($location, $rename);
        }

        $clothes->update($validated);

        return redirect('/clothes')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clothing $clothes)
    {
        
        File::delete('file/' . $clothes->gambar_depan);
        File::delete('file/' . $clothes->gambar_belakang);

        $clothes->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }

    public function pakaian() {
        
        return view('User.pakaian', [
            'clothes' => Clothing::latest()->get()
        ]);
    }
}
