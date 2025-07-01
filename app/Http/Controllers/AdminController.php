<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function edit(User $admin) {
        
        return view('Admin.edit', [
            'admin' => $admin
        ]);
    }

    public function update(Request $request, User $admin) {

        $rules = [
            'name' => 'required|max:100',  
            'password' => 'required|max:15', 
        ];

        if ($request->email != $admin->email) {
            $rules['email'] = 'required|max:25|unique:admin|unique:customers';
        }

        $validated = $request->validate($rules);

        $admin->update($validated);

        return back()->with('success', "Berhasil mengupdate data admin");
   
    }
}
