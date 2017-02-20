<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Manstreet extends Model
{
    protected $table = "man_goods";

    public function GoodsList()
    {
        $goods_show = DB::table('man_goods')->where('is_new','1')->orderBy('sort','asc')->limit(4)->get();
        return $goods_show;
    }

}
