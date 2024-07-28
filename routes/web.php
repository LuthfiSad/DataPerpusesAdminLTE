<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
  })->name('dashboard')->middleware('auth');

Route::get('/', [loginController::class, 'login'])->name('login')->middleware('guest'); 
Route::post('/log', [loginController::class, 'validasi'])->name('login.store'); 
Route::post('/logout', [loginController::class, 'logout'])->name('logout'); 
Route::get ('/register',[registerController::class,'register'])->name('register');
Route::post ('/regist',[registerController::class,'store'])->name('register.store');

Route::resource('perpuses', PerpusController::class)->except('show')->middleware('auth');