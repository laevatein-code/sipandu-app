<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IpdsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Models\Wokrspace;

// Route::get('/', function () {
//     return view('dashboard-ipds',['items' => Item::ipdsItems(),'workspace' => Wokrspace::ipdsWorspace()]);
// });

Route::get('/home', function(){
    return view('/home');
});

Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/ipds', IpdsController::class)->middleware('auth');

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'auth']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/dashboard/admin', AdminController::class);

Route::get('/sosial', function () {
    return view('dashboard-sosial',[
        
    ]);
});

Route::get('/produksi', function () {
    return view('dashboard-produksi',[
        
    ]);
});

Route::get('/distribusi', function () {
    return view('dashboard-distribusi',[
        
    ]);
});

Route::get('/neraca', function () {
    return view('dashboard-neraca',[
        
    ]);
});

Route::get('/tata-usaha', function () {
    return view('dashboard-tata-usaha',['items' => Item::tuItems(),'workspace' => Wokrspace::tuWorspace()]);
});