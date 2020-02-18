<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\URL;

class PagesController extends Controller
{
    public function index() {
        $goods = App\Goods::getAllGoods();
        $cartlist = App\Goods::CartList();
        return view('index', compact('goods','cartlist'));
    }

    public function getCurrentGood($category, $id) {
        $good = App\Goods::getCurrentGood($id);
        $cartlist = App\Goods::CartList();
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
