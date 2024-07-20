<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Register extends Controller
{
    public function index(){
        return View('register');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'user_nip' => 'required',
        ]);

        $validate['password'] = bcrypt($validate['password']);

        User::create([
            'name' => $validate['name'],
            'password' => $validate['password'],
            'email' => $validate['email'],
            'user_nip' => $validate['user_nip'],
            'status' => 'User'
        ]);

        return redirect('/')->with('success','Registration Successfull');
    }
}
