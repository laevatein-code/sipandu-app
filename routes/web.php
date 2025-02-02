<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\IpdsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NeracaController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SosialController;
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

// Neraca
Route::resource('/neraca', NeracaController::class)->middleware('auth');
Route::post('/neraca/{id}/create', [NeracaController::class, 'storeItems']);
Route::get('/files/download/{id}', [NeracaController::class, 'download']);
Route::delete('/neraca/{id}/delete', [NeracaController::class, 'deleteItems'])->name('neraca.deleteItems');
Route::put('/neraca/{id}/editItem', [NeracaController::class, 'updateItems'])->name('neraca.updateItems');
Route::put('/neraca/{id}/upload', [NeracaController::class, 'upload']);

// Produksi
Route::resource('/produksi', ProduksiController::class)->middleware('auth');
Route::post('/produksi/{id}/create', [ProduksiController::class, 'storeItems']);
Route::get('/files/download/{id}', [ProduksiController::class, 'download']);
Route::delete('/produksi/{id}/delete', [ProduksiController::class, 'deleteItems'])->name('produksi.deleteItems');
Route::put('/produksi/{id}/editItem', [ProduksiController::class, 'updateItems'])->name('produksi.updateItems');
Route::put('/produksi/{id}/upload', [ProduksiController::class, 'upload']);

// Sosial
Route::resource('/sosial', SosialController::class)->middleware('auth');
Route::post('/sosial/{id}/create', [SosialController::class, 'storeItems']);
Route::get('/files/download/{id}', [SosialController::class, 'download']);
Route::delete('/sosial/{id}/delete', [SosialController::class, 'deleteItems'])->name('sosial.deleteItems');
Route::put('/sosial/{id}/editItem', [SosialController::class, 'updateItems'])->name('sosial.updateItems');
Route::put('/sosial/{id}/upload', [SosialController::class, 'upload']);

// Auth
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'auth']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/dashboard/admin', AdminController::class);