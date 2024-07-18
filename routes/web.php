<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\IpdsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TuController;
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

// IPDS
Route::resource('/ipds', IpdsController::class)->middleware('auth');
Route::post('/ipds/{id}/create', [IpdsController::class, 'storeItems']);
Route::get('/files/download/{id}', [IpdsController::class, 'download']);
Route::delete('/ipds/{id}/delete', [IpdsController::class, 'deleteItems'])->name('ipds.deleteItems');
Route::put('/ipds/{id}/editItem', [IpdsController::class, 'updateItems'])->name('ipds.updateItems');
Route::put('/ipds/{id}/upload', [IpdsController::class, 'upload']);

// TU
Route::resource('/tata-usaha', TuController::class)->middleware('auth');
Route::post('/tata-usaha/{id}/create', [TuController::class, 'storeItems']);
Route::get('/files/download/{id}', [TuController::class, 'download']);
Route::delete('/tata-usaha/{id}/delete', [TuController::class, 'deleteItems'])->name('tata-usaha.deleteItems');
Route::put('/tata-usaha/{id}/editItem', [TuController::class, 'updateItems'])->name('tata-usaha.updateItems');
Route::put('/tata-usaha/{id}/upload', [TuController::class, 'upload']);

// Distribusi
Route::resource('/distribusi', DistribusiController::class)->middleware('auth');
Route::post('/distribusi/{id}/create', [DistribusiController::class, 'storeItems']);
Route::get('/files/download/{id}', [DistribusiController::class, 'download']);
Route::delete('/distribusi/{id}/delete', [DistribusiController::class, 'deleteItems'])->name('distribusi.deleteItems');
Route::put('/distribusi/{id}/editItem', [DistribusiController::class, 'updateItems'])->name('distribusi.updateItems');
Route::put('/distribusi/{id}/upload', [DistribusiController::class, 'upload']);

// Auth
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'auth']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/dashboard/admin', AdminController::class);