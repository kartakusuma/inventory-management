<?php

use App\Http\Controllers\DistributorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login-process');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
    
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('users/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('distributors', [DistributorController::class, 'index'])->name('distributors');
    Route::get('distributors/create', [DistributorController::class, 'create'])->name('distributors.create');
    Route::post('distributors/store', [DistributorController::class, 'store'])->name('distributors.store');
    Route::get('distributors/{id}/edit', [DistributorController::class, 'edit'])->name('distributors.edit');
    Route::patch('distributors/{id}/update', [DistributorController::class, 'update'])->name('distributors.update');
    Route::delete('distributors/{id}/destroy', [DistributorController::class, 'destroy'])->name('distributors.destroy');
});