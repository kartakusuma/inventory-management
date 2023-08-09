<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistributorController extends Controller
{
    public function index() {
        $distributors = Distributor::all();

        return view('distributor.index', compact('distributors'));
    }

    public function create() {
        return view('distributor.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        Distributor::create([
            'name' => $request->name,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
        ]);

        return redirect()->route('distributors');
    }

    public function edit($id) {
        $distributor = Distributor::find($id);

        return view('distributor.edit', compact('distributor'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = $request->only(['name', 'email', 'whatsapp']);

        Distributor::whereId($id)->update($data);

        return redirect()->route('distributors');
    }

    public function destroy($id) {
        Distributor::whereId($id)->delete();

        return redirect()->route('distributors');
    }
}
