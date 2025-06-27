<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function edit(User $admin) {
        
        return $admin;
        // return view('Admin.edit')
    }
}
