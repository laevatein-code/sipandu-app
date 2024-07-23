<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Dashboard extends Controller
{
    public function index(): View
    {
        $item_bM = Item::where('progress','Belum Mulai');
        $item_iP = Item::where('progress','In Progress');
        $item_C = Item::where('progress','Completed');
        $ipds = DB::select('select * from items where w_id IN (select id from workspaces where workspace_seksi IN (select id from members where seksi = "IPDS"))');
        $tataUsaha = DB::select('select * from items where w_id IN (select id from workspaces where workspace_seksi IN (select id from members where seksi = "Tata Usaha"))');
        $distribusi = DB::select('select * from items where w_id IN (select id from workspaces where workspace_seksi IN (select id from members where seksi = "Distribusi"))');
        $sosial = DB::select('select * from items where w_id IN (select id from workspaces where workspace_seksi IN (select id from members where seksi = "Sosial"))');
        $neraca = DB::select('select * from items where w_id IN (select id from workspaces where workspace_seksi IN (select id from members where seksi = "Neraca"))');
        $produksi = DB::select('select * from items where w_id IN (select id from workspaces where workspace_seksi IN (select id from members where seksi = "Produksi"))');

        return view('contents/dashboard', compact('item_bM','item_iP','item_C','ipds','tataUsaha','distribusi','sosial','neraca','produksi'));
    }
}
