<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){
        
        $productList= DB::table('product')
        ->take(4)
        ->get();
        $productAll= DB::table('product')
        ->paginate(4);

        return view('layouts/content/home')->with([
            'productList'=>$productList,
            'productAll'=>$productAll,
        ]);
    }
}
