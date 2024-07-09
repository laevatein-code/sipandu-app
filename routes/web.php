<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;

Route::get('/', function () {
    return view('dashboard-ipds',['items' => Item::ipdsItems()]);
});

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
    return view('dashboard-tata-usaha',['items' => Item::tuItems()]);
});