<?php

namespace App\Http\Controllers;

use App\Models\CartClothing;
use App\Models\Clothing;
use App\Models\Customer;
use Illuminate\Http\Request;

class CartClothingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Customer $customer)
    {

        return view('User.keranjang', [
            'customer' => $customer->load('cartClothing', 'cartProduct')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Clothing $clothes, Customer $customer) {
        
        return view('User.addCartPakaian', [
            'clothes' => $clothes, 
            'customer' => $customer, 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'customer_id' => 'required', 
            'clothing_id' => 'required', 
            'jumlah' => 'required'
        ]);

        CartClothing::create($validated);

        return redirect('keranjang/' . $validated['customer_id'])->with('success', 'Berhasil menambahkan pakaian ke keranjang');
    }

    /**
     * Display the specified resource.
     */
    public function show(CartClothing $cartClothing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartClothing $cartClothing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartClothing $cartClothing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartClothing $cart)
    {
        $cart->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }
}
