<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkspaceMember extends Model
{
    use HasFactory;

    protected $table = 'workspaceMembers';
    protected $guard = ['id'];

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class, 'w_id');
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'w_anggota');
    }
}
