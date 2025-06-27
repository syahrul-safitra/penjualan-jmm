<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

use illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('Auth.login');
    }

    public function auth(Request $request) {
        $credential = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|max:15'
        ]);

        if(Auth::guard('admin')->attempt($credential)) {
            return redirect()->intended('/dashboard');
        }

        if (Auth::guard('customer')->attempt($credential)) {
            return redirect('/');
        }

        return back()->with('loginError', 'Login Failed');   
    }


    public function logout() {
        Auth::guard('admin')->logout();
        Auth::guard('customer')->logout();

        return redirect('/login');
    }

}
