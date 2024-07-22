<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Workspace extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    public function seksi(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'workspace_seksi');
    }
}
