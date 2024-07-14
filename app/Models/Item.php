<?php 

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Item extends Model {
    protected $fillable = ['nama','Anggota','status','dueDate','files','workspace_id'];

    public function konten(): BelongsTo
    {
        return $this->belongsTo(Wokrspace::class, 'workspace_id');
    }

    public static function ipdsItems(){
        $items = DB::select('select * from items where(select id from workspace where seksi_id = 1)');
        
        // $query = DB::table('items')
        //     ->select(['*'])
        //     ->where('workspace_id','=',Wokrspace::all(['id'])
        //         ->where('seksi_id','=',1));
        return $items;
    }

    public static function tuItems(){
        $items = DB::select('select * from items where(select id from workspace where seksi_id = 6)');
        
        return $items;
    }

    public static function produksiItem(){
        $items = Item::where('seksi_id','Produksi')->get();

        return $items;
    }

    public static function sosialItem(){
        $items = Item::where('seksi_id','Sosial')->get();

        return $items;
    }

    public static function distribusiItem(){
        $items = Item::where('seksi_id','Distribusi')->get();

        return $items;
    }

    public static function neracaItem(){
        $items = Item::where('seksi_id','Neraca')->get();

        return $items;
    }
}

?>