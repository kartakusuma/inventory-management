<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index() {
        $distributors = Distributor::all();

        return view('distributor.index', compact('distributors'));
    }

    public function create() {
        // 
    }

    public function store() {
        // 
    }

    public function edit() {
        // 
    }

    public function update() {
        // 
    }

    public function destroy() {
        // 
    }
}
