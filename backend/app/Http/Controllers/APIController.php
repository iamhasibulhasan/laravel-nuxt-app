<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //Product show
    public function allProducts(){
        $products = Product::where('status', 1)->get();
        $apiData = [
            'status'        =>  true,
            'msg'           =>  'All products data',
            'products'     =>  $products,
            'imagepath'     =>  public_path()
        ];
        return response()->json($apiData);
    }
}
