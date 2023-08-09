<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function create() {
        $users = User::all();
        return view('user.create', compact('users'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users');

    }

    public function show($id) {
        // 
    }

    public function edit($id) {
        // 
    }

    public function update(Request $request, $id) {
        // 
    }

    public function destroy($id) {
        // 
    }
}
