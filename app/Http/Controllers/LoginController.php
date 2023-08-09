<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $authData = $request->only(['email', 'password']);

        if (Auth::attempt($authData)) {
            return redirect()->route('dashboard');
        }

        return redirect()->back();
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
