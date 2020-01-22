<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Goods extends Model
{
    public static function getAllGoods() {
	    return $goods = DB::table('goods')->get();
	}
	public static function getCurrentGood($id) {
	    return $good = DB::table('goods')->find($id);
	}
}
