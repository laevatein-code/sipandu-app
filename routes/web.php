<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Login;
use App\Http\Controllers\Management;
use App\Http\Controllers\Register;
use App\Http\Controllers\User;
use App\Http\Controllers\Workspace;
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
Route::resource('/contents/dashboard', Dashboard::class)->middleware('auth');

// Workspace
Route::resource('/contents/workspace', Workspace::class)->middleware('auth');

// Users
Route::resource('/contents/users', User::class)->middleware('auth');
Route::put('/contents/users/{{id}}', [User::class, 'update']);
Route::get('contents/users/{{id}}/edit', [User::class, 'edit']);

Route::resource('/contents/management/', Management::class);