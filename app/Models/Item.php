<?php 

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    protected $fillable = ['nama','jumlahAnggota','status','dateStart','dateEnd','files','workspace'];

    public static function ipdsItems(){
        $items = Item::where('seksi','IPDS')->get();

        return $items;
    }

    public static function tuItems(){
        $items = Item::where('seksi','Tata Usaha')->get();

        return $items;
    }

    public static function produksiItem(){
        $items = Item::where('seksi','Produksi')->get();

        return $items;
    }

    public static function sosialItem(){
        $items = Item::where('seksi','Sosial')->get();

        return $items;
    }

    public static function distribusiItem(){
        $items = Item::where('seksi','Distribusi')->get();

        return $items;
    }

    public static function neracaItem(){
        $items = Item::where('seksi','Neraca')->get();

        return $items;
    }
}

?>