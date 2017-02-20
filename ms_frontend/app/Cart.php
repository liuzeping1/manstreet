<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cart extends Model
{
    protected $table = "man_cart";

    //查询
    public function show()
    {
        $res = DB::table('man_cart')->get();
        return $res;
    }

}
