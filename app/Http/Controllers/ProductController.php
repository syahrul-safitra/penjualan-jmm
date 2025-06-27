<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Product.index', [
            'products' => Product::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Product.create');
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
            'gambar' => 'required|max:2050', 
        ]);

        $file1 = $request->file('gambar');

        $renameFile1 = uniqid() . '_' . $file1->getClientOriginalName();

        $validated['gambar'] = $renameFile1;

        $tujuan_upload = 'file';

        $file1->move($tujuan_upload, $renameFile1);

        // Create data : 
        Product::create($validated);

        return redirect('/product')->with('success', 'Berhasil menginput ' . $validated['nama']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('Admin.Product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'harga' => 'required|numeric', 
            'jumlah' => 'required|numeric',
            'deskripsi' => 'required|max:200',
            'gambar' => 'max:2050', 
        ];

        if($request->nama != $product->nama) {
            $rules['nama'] = 'required|max:200|unique:products';
        }

        $validated = $request->validate($rules);

        $location = 'file';
        
        if ($request->file('gambar')) {
            $file1 = $request->file('gambar');

            $rename = uniqid() . '_' . $file1->getClientOriginalName();

            $validated['gambar'] = $rename;

            File::delete('file/' . $product->gambar);

            $file1->move($location, $rename);
        }

        $product->update($validated);

        return redirect('/product')->with('success', 'Berhasil mengupdate data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        File::delete('file/' . $product->gambar);

        $product->delete();

        return back()->with('success', 'Berhasil menghapus data');

    }

    public function produk() {
        return view('User.product', [
            'products' => Product::latest()->get()
        ]);
    }
}
