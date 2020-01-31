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

    public static function getFilteredGood($category) {
        $empty = false;

        $categoryList = array("computers", "house", "electronic", "clothers", "sport", "childrens", "smartphones", "car");
        foreach ($categoryList as $val) {
            if ($category === $val) {
                $filteredGood = DB::table('goods')->get()->where('category', $category);
                if (!$filteredGood->isEmpty()) {
                    return $filteredGood;
                } else return null;
            } else $empty = true;
        }

        if ($empty) {
            abort(404);
        }
    }

}
