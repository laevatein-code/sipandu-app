<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wokrspace extends Model
{
    use HasFactory;

    protected $fillable = ['nama','pembuat'];
    protected $table = 'workspace';

    public static function ipdsWorspace(){
        $workspace = Wokrspace::where('seksi','IPDS')->get();

        return $workspace;
    }

    public static function tuWorspace(){
        $workspace = Wokrspace::where('seksi','Tata Usaha')->get();

        return $workspace;
    }
}
