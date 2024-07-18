<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wokrspace extends Model
{
    use HasFactory;

    public function author(): BelongsTo
    {
        return $this->belongsTo(Anggota::class, 'author_id');
    }

    public function seksis(): BelongsTo
    {
        return $this->belongsTo(Seksi::class, 'seksi_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class, '');
    }

    protected $table = 'workspace';
    protected $fillable = ['id','nama','author_id','seksi_id','created_at','updated_ad'];

    public static function ipdsWorspace(){
        $workspace = Wokrspace::where('seksi_id',1)->get();

        return $workspace;
    }

    public static function tuWorspace(){
        $workspace = Wokrspace::where('seksi_id',6)->get();

        return $workspace;
    }

    public static function distribusiWorkspace(){
        $workspace = Wokrspace::where('seksi_id',1)->get();

        return $workspace;
    }

    public static function sosialWorkspace(){
        $workspace = Wokrspace::where('seksi_id',1)->get();

        return $workspace;
    }

    public static function produksiWorkspace(){
        $workspace = Wokrspace::where('seksi_id',1)->get();

        return $workspace;
    }

    public static function neracaWorkspace(){
        $workspace = Wokrspace::where('seksi_id',1)->get();

        return $workspace;
    }
}
