<?php

namespace App\Http\Controllers;

use App\Models\CartClothing;
use App\Models\Clothing;
use App\Models\Customer;
use App\Models\OrderClothing;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class OrderClothingController extends Controller
{

    public function index() {
        return view('Admin.OrderClothes.index', [
            'orders' => OrderClothing::with('cloth', 'customer')->latest()->get()
        ]);
    }

    public function create(CartClothing $cart, Customer $customer) {

        return view('User.orderPakaian', [
            'clothes' => $cart->load('clothing'), 
            'customer' => $customer
        ]);
    }

    public function store(Request $request) {
        
        $validated = $request->validate([
            'customer_id' => 'required',
            'clothing_id' => 'required',
            'jumlah' => 'required',
            'total_hargaa' => 'required', 
            'keterangan' => 'max:201',
            'bukti' => 'required:max:2500',
            'desain' => 'required:max:2500',
            'ukuran' => 'required', 
            'cart_id' => 'required'
        ]);

        $newData = [
            'customer_id' => $validated['customer_id'],
            'clothing_id' => $validated['clothing_id'],
            'jumlah' => $validated['jumlah'],
            'total_harga' => $validated['total_hargaa'], 
            'keterangan' => $validated['keterangan'],
            // 'bukti' => $validated['bukti'],
            // 'desain' => $validated['desain'],
            'ukuran' => $validated['ukuran']
        ];

        $cart = CartClothing::find($validated['cart_id']);

        if ($cart == null) {
            return back()->with('errorCart', 'Cart Not Found');
        }

        // Location File : 
        $locationFile = 'file';

        // File Desain
        $fileDesain = $request->file('desain');

        $renameFileDesain = uniqid() . '_' . $fileDesain->getClientOriginalName();

        $newData['desain'] = $renameFileDesain;

        $fileDesain->move($locationFile, $renameFileDesain);

        // File Bukti 
        $fileBukti = $request->file('bukti');

        $renameFileBukti = uniqid() . '_' . $fileBukti->getClientOriginalName();

        $newData['bukti'] = $renameFileBukti;
        
        $fileBukti->move($locationFile, $renameFileBukti);

        OrderClothing::create($newData);

        $cart->delete();

        $clothing = Clothing::find($validated['clothing_id']);

        $clothing->jumlah = $clothing->jumlah - $validated['jumlah'];

        $clothing->save();

        
        return redirect('/history/' . $validated['customer_id'])->with('success', 'Berhasil pesan pakaian, silahkan tunggu beberapa saat dan admin akan mengkonfirmasi');
          
    }

    public function detailOrder(OrderClothing $order) {
        
        return view('User.detailOrderCloth', [
            'orderDetail' => $order->load('cloth', 'customer')
        ]);
    }

    public function edit(OrderClothing $order) {
        
        return  view('Admin.OrderClothes.edit', [
            'order' => $order->load('cloth', 'customer')
        ]);
    }

    public function setStatus(Request $request, OrderClothing $order) {
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

    public function destroy(OrderClothing $order) {
        File::delete('file/' . $order->desain);
        File::delete('file/' . $order->bukti);

        $order->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }
}
