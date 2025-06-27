<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class CartProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product, Customer $customer)
    {
        return view('User.addCartProduk', [
            'product' => $product, 
            'customer' => $customer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required',
            'product_id' => 'required', 
            'jumlah' => 'required'
        ]);

        CartProduct::create($validated);

        return redirect('keranjang/' . $validated['customer_id'])->with('success', 'Berhasil menambahkan product ke keranjang');
    }

    /**
     * Display the specified resource.
     */
    public function show(CartProduct $cartProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartProduct $cartProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartProduct $cartProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartProduct $cart)
    {

        $cart->delete();

        return back()->with('success', 'Berhasil menghapus data product');
    }
}
