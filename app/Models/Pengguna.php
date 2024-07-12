<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'penggunas';
    
    public function anggotas(): HasOne
    {
        return $this->hasOne(Anggota::class);
    }

    public function seksis(): HasOne
    {
        return $this->hasOne(Seksi::class);
    }
}
