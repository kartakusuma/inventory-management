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
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    public function edit($id) {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = $request->only(['name', 'email']);

        if ($request->password) {
            $validator = Validator::make($request->all(), [
                'password' => 'min:8',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);

        return redirect()->route('users');
    }

    public function destroy($id) {
        User::whereId($id)->delete();

        return redirect()->route('users');
    }
}
