<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Goods extends Model
{
    public static function getAllGoods() {
	    return $goods = DB::table('goods')->get();
	}

	public static function getCurrentGood($id) {
        $good = DB::table('goods')->find($id);
        $views_update = DB::table('goods')->select('*')
            ->where('id', '=', $id)->update(['views' => $good->views + 1]);
	    return $good;

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

    public static function addCart($id)
    {
        $itemQuery = DB::table('users')->select('*')->where('name', '=', Auth::user()->name);
        $user = $itemQuery->first();
        $coincidence = false;
        $list = explode(",", $user->cartitems);

        foreach ($list as $key => $val) {
            if ($val === $id) {
                $coincidence = true;
            }
        }

        if (isset($_POST["cart"])) {
            if (!$user->cartitems || empty($user->cartitems) || $user->cartitems == null) {
                $itemQuery->update(['cartitems' => $id]);
                return '<h4> Товар добавлен в корзину </h4>';
            } elseif ($coincidence) {
                return false;
            } else {
                $itemQuery->update(['cartitems' => $user->cartitems . ',' . $id]);
            }
        }
    }

    // public static function removeCart($id)
    // {
    //     $itemQuery = DB::table('users')->select('*')->where('name', '=', Auth::user()->name);
    //     $user = $itemQuery->first();
    //     $list = explode(",", $user->cartitems);
    //     $key = array_search($id, $list);
    //     unset($list[$key]);
    //     $itemQuery->update(['cartitems' => $list[$key]]);
    //     print_r($list);
    //     echo $id, '-', $key;
    //     return 'ti lox';
    // }

    public static function CartList() {
        if (Auth::check()) {
            $itemQuery = DB::table('users')->select('*')->where('name', '=', Auth::user()->name);
            $ids = explode(",", $itemQuery->first()->cartitems);
            return $goods = DB::table('goods')->whereIn('id', $ids)->get();
        }
    }
}
