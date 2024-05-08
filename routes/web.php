<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [DashbordController::class, 'index'])->name('dashboard.index');

// User
//Route::resource('/user', [UserController::class, 'index'])->name('data.index');
//Route::post('user/save', [UserController::class, 'store'])->name('user.store');

Route::resource('user',UserController::class);
