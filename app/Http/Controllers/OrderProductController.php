<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use App\Models\Customer;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class OrderProductController extends Controller
{

    public function index() {
        return view('Admin.OrderProduct.index', [
            'orders' => OrderProduct::latest()->get()
        ]);
    }

    public function create(CartProduct $cart, Customer $customer) {
        return view('User.orderProduct', [
            'cart' => $cart, 
            'customer' => $customer
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'customer_id' => 'required',
            'product_id' => 'required',
            'jumlah' => 'required',
            'total_hargaa' => 'required', 
            'keterangan' => 'max:201',
            'bukti' => 'required:max:2500',
            'cart_id' => 'required'
        ]);

        $newData = [
            'customer_id' => $validated['customer_id'],
            'product_id' => $validated['product_id'],
            'jumlah' => $validated['jumlah'],
            'total_harga' => $validated['total_hargaa'], 
            'keterangan' => $validated['keterangan'],
            // 'bukti' => $validated['bukti'],
            // 'desain' => $validated['desain'],
        ];

        $cart = CartProduct::find($validated['cart_id']);

        if ($cart == null) {
            return back()->with('errorCart', 'Cart Not Found');
        }

        // Location File : 
        $locationFile = 'file';
        
        $fileBukti = $request->file('bukti');

        $renameFileBukti = uniqid() . '_' . $fileBukti->getClientOriginalName();

        $newData['bukti'] = $renameFileBukti;
        
        $fileBukti->move($locationFile, $renameFileBukti);

        OrderProduct::create($newData);

        $cart->delete();

        $product = Product::find($validated['product_id']);

        $product->jumlah = $product->jumlah - $validated['jumlah'];

        $product->save();

        return redirect('/history/' . $validated['customer_id'])->with('success', 'Berhasil pesan produk, silahkan tunggu beberapa saat dan admin akan mengkonfirmasi');
        
    }

    public function detailOrder(OrderProduct $order) {

        return view('User.detailOrderProduct', [
            'orderDetail' => $order->load('product', 'customer')
        ]);
    }

    public function edit(OrderProduct $order) {
        return view('Admin.OrderProduct.edit', [
            'order' => $order->load('product', 'customer')

        ]);
    }

    public function setStatus(Request $request, OrderProduct $order) { 
    
        $validated = $request->validate([
            'status' => 'required', 
            'bukti' => 'max:2300'
        ]);

        $file = $request->file('bukti');

        if ($file) {
            $renameFile = uniqid() . '_' . $file->getClientOriginalName();

            File::delete('file/' . $order->bukti);

            $order->bukti = $renameFile;

            $file->move('file', $renameFile);
        }

        $getStatus = $validated['status'];

        $order->status = $getStatus;

        $order->save();

        return back()->with('success', 'Berhasil mengupdate data');
    
    }

    public function destroy(OrderProduct $order) {
        File::delete('file/' . $order->bukti);

        $order->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }

}