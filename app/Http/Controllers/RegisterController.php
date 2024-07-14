<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(){
        return View('register');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'pengguna_id' => 'required|min:9',
            'username' => 'required',
            'password' => 'required',
            'status' => 'required',
            'seksi' => 'required'
        ]);

        $validate['password'] = bcrypt($validate['password']);

        Pengguna::create([
            'pengguna_id' => $validate['pengguna_id'],
            'username' => $validate['username'],
            'password' => $validate['password'],
            'status' => $validate['status'],
            'seksi_id' => $validate['seksi']
        ]);

        return redirect('/')->with('success','Registration Successfull');
    }
}
