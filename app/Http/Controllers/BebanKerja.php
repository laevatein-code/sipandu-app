<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BebanKerja extends Controller
{
    public function index() : View
    {
        $items = Item::all();

        return view('contents/bebanKerja', ['items'=>$items]);
    }
}
