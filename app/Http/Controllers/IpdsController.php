<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Wokrspace;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IpdsController extends Controller
{
    public function index() : View
    {
        $ipds = Item::ipdsItems();
        $workspace = Wokrspace::ipdsWorspace();

        return view('ipds', ['items' => $ipds, 'workspace' => $workspace]);
    }   

    public function createWorkspace() : View
    {
        return view('ipds');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'author' => 'required|min:9',
            'seksi' => 'required'
        ]);

        Wokrspace::create([
            'nama' => $request->nama,
            'author_id' => $request->author,
            'seksi_id' => $request->seksi
        ]);

        return redirect()->route('ipds')->with(['sukses' => 'Data Berhasil Disimpan']);
    }
}
