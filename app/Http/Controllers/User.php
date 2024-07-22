<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User as ModelsUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class User extends Controller
{
    public function index(): View
    {
        $users = ModelsUser::all();

        return view('contents.users', ['users'=>$users]);
    }

    public function update(Request $request, $post): RedirectResponse
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'status' => 'required'
        ]);

        $users = ModelsUser::findOrFail($post);

        $member = Member::findOrFail($users->user_nip);

        $users->update([
            'name' => $validate['username'],
            'email' => $validate['email'],
            'status' => $validate['status']
        ]);

        $member->update([
            'nama' => $validate['nama']
        ]);

        return redirect('contents/users')->with('success', 'Update Data Berhasil');
    }

    public function destroy($post): RedirectResponse
    {
        ModelsUser::destroy($post);
        
        return redirect('contents/users')->with('success','User berhasil dihapus');
    }

    public function edit($edit){
        return view('modal/user', [
            'user' => ModelsUser::findOrFail($edit)
        ]);
    }
}
