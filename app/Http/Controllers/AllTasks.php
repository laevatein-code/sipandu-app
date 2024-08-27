<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AllTasks extends Controller
{
    public function index(): View
    {
        $items = Item::all();

        return view('contents/dataTables', ['items' => $items]);
    }
}
