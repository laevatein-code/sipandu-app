<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use Illuminate\Support\Facades\Route;

Route::get('home', function(){
    return view('contents/dashboard');
})->name('home');

Route::get('/', [Login::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [Login::class, 'auth']);
Route::post('/logout', [Login::class, 'logout']);

Route::get('/profile', function(){
    return view('contents.profil');
});

Route::get('/register', [Register::class, 'index'])->middleware('guest');
Route::post('/register', [Register::class, 'store']);

// Dashboard
Route::resource('/contents/dashboard', Dashboard::class);