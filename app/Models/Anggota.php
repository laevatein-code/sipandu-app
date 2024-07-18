<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    public static function getId() {
        $query = DB::table('anggota')->select('NIP');
        $anggotas = $query->get();

        $value = [];

        foreach ($anggotas as $anggota){
            foreach ($anggota as $key => $values){
                array_push($value,$values);
            }
        };

        return $value;
    }

    public function cekAnggota(): HasOne
    {
        return $this->hasOne(Pengguna::class);
    }

    public function authors(): HasMany
    {
        return $this->hasMany(Wokrspace::class);
    }
}
