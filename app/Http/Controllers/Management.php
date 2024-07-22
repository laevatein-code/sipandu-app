<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class Management extends Controller
{
    public function index(): View
    {
        return view('contents/management');
    }
}
