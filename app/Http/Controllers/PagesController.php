<?php

namespace App\Http\Controllers;

use App;

class PagesController extends Controller
{
    public function index() {
        $cartlist = App\Goods::CartList();
        $goods = App\Goods::getAllGoods();
        return view('index', compact('goods','cartlist'));
    }

    public function getCurrentGood($category, $id) {
        $cartlist = App\Goods::CartList();
        $good = App\Goods::getCurrentGood($id);
        return view('good', compact('good','category','cartlist'));
    }

    public function getFilteredGood($category) {
        $cartlist = App\Goods::CartList();
        $filtered_good = App\Goods::getFilteredGood($category);
        return view('search', compact('filtered_good','cartlist'));
    }

    public function search() {
        $cartlist = App\Goods::CartList();
        $filtered_good = App\Goods::Search();
        return view('search', compact('filtered_good', 'cartlist'));
    }
    public function removeCart($id) {
        $result = App\Goods::removeCart($id);
        return redirect()->back();
    }
}
