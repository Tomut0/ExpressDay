<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    public function index() {
        $goods = App\Goods::getAllGoods();
        return view('index', compact('goods'));
    }

    public function getCurrentGood($category, $id) {
        $good = App\Goods::getCurrentGood($id);
        return view('good', compact('good','category'));
    }

    public function getFilteredGood($category) {
        $filtered_good = App\Goods::getFilteredGood($category);
        return view('search', compact('filtered_good'));
    }
    public function Search(Request $request) {
        return view('search');
    }
}
