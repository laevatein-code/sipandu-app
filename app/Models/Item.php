<?php 

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Item extends Model {
    protected $fillable = ['nama','Anggota','status','dateStart','dateEnd','files','workspace_id','is_upload','fileNames'];

    public function konten(): BelongsTo
    {
        return $this->belongsTo(Wokrspace::class, 'workspace_id');
    }

    public static function ipdsItems(){
        $items = DB::select('select * from items where(select id from workspace where seksi_id = 1)');
        
        return $items;
    }

    public static function tuItems(){
        $items = DB::select('select * from items where(select id from workspace where seksi_id = 6)');
        
        return $items;
    }

    public static function produksiItem(){
        $items = DB::select('select * from items where(select id from workspace where seksi_id = 3)');

        return $items;
    }

    public static function sosialItem(){
        $items = DB::select('select * from items where(select id from workspace where seksi_id = 4)');

        return $items;
    }

    public static function distribusiItem(){
        $items = DB::select('select * from items where(select id from workspace where seksi_id = 2)');

        return $items;
    }

    public static function neracaItem(){
        $items = DB::select('select * from items where(select id from workspace where seksi_id = 5)');

        return $items;
    }
}

?>