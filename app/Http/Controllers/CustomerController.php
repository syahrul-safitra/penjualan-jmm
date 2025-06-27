<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Customer.index', [
            'customers' => Customer::latest()->get()
        ]);
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
        $validated = $request->validate([
            'name' => 'required|max:100', 
            'email' =>'required|unique:customers|unique:admin|max:100', 
            'password' => 'required|max:15', 
            'no_wa' => 'required|max:15', 
            'alamat' => 'required|max:200', 
            'gambar' => 'required|max:2000'
        ]);

        $validated['password'] = bcrypt($request->password);

        $file = $request->file('gambar');
        $renameFile = uniqid() . '_' . $file->getClientOriginalName();

        $validated['gambar'] = $renameFile;

        Customer::create($validated);

        $file->move('file', $renameFile);

        return "Berhasil register";

        // return redirect('/login')->with('success', 'Berhasil registrasi costumer, silahkan login');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('Admin.Customer.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $rules = [
            'name' => 'required|max:100', 
            'password' => 'required|max:15',
            'no_wa' => 'required|max:15', 
            'alamat' => 'required|max:100', 
            'gambar' => 'max:2400'
        ];

        if ($request->email != $customer->email) {
            $rules['email'] = 'required|unique:customers|unique:admin|max:100';
        }

        if ($request->no_wa != $customer->no_wa) {
            $rules['no_wa'] = 'required|unique:customers';
        }

        $validated = $request->validate($rules);

        $validated['password'] = bcrypt($request->password);

        $file = $request->file('gambar');

        if ($file) {
            $renameFile = uniqid() . '_' . $file->getClientOriginalName();

            $validated['gambar'] = $renameFile;

            // Hapus gambar lama : 
            File::delete('file/' . $customer->gambar);

            $file->move('file', $renameFile);
        }

        $customer->update($validated);

        return redirect('customers')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        File::delete('file/' . $customer->gambar);

        $customer->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }

    public function history(Customer $customer) {

        return view('User.history', [
            'customer' => $customer->load('orderCloth.cloth', 'orderProduct.product') 
        ]);

    }
}
