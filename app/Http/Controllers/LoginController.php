<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function view() {
        if (Auth::user()) {
            return redirect('');
        }
        
        return view('login');
    }

    public function login(Request $request) {
        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect('');
        }

        return redirect(route('login'));
    }

    public function logout() {
        Auth::logout();
        return redirect(route('login'));
    }
}
