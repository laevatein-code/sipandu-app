<?php

use App\Http\Controllers\allTasks;
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

Route::get('/modal/management/tambah', function(){
    return view('modal/managementTambah');
});

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

// Management
Route::resource('/contents/management/', Management::class);
Route::delete('/contents/management/{id}/delete', [Management::class, 'hapus'])->name('management.delete');
Route::get('/contents/management/{id}/edit', [Management::class, 'editWorkspace']);
Route::put('/contents/management/edit/{id}', [Management::class, 'updateWorkspace']);
Route::get('contents/management/{id}/tambahAnggota', [Management::class, 'tambahAnggota']);
Route::post('contents/management/tambahAnggota/{id}', [Management::class, 'createAnggota']);
Route::get('contents/items/{id}', [Management::class, 'getItems']);
Route::get('modal/items/tambah/{id}', [Management::class, 'tambahItems']);
Route::put('modal/items/{id}', [Management::class, 'createItems']);
Route::delete('contents/item/hapus/{id}', [Management::class, 'hapusItem']);
Route::get('contents/items/edit/{id}', [Management::class, 'editItem']);
Route::put('modal/items/update/{id}',[Management::class, 'updateItem']);
Route::get('files/download/{id}', [Management::class, 'download']);

// Datatables
Route::get('/contents/semuaTugas', [AllTasks::class, 'index']);

// Workspaces
Route::put('/contents/workspaces/progress/{id}', [Workspace::class, 'updateProgress'])->name('workspace.submit');
Route::get('/contents/workspaces/upload/{id}', [Workspace::class, 'editFile']);
Route::put('/contents/workspaces/file/{id}', [Workspace::class, 'updateFile']);