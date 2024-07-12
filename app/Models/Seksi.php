<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seksi extends Model
{
    use HasFactory;

    protected $table = 'seksi';

    public static function getID() {
        $query = DB::table('seksi')->select('id');
        $seksi = $query->get();

        return $seksi;
    }
}
