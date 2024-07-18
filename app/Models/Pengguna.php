<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'penggunas';
    protected $fillable = [
        'pengguna_id',
        'seksi_id',
        'status',
        'username',
        'password'
    ];
    
    public function anggotas(): BelongsTo
    {
        return $this->belongsTo(Anggota::class, 'pengguna_id');
    }

    public function seksis(): HasOne
    {
        return $this->hasOne(Seksi::class);
    }
}
