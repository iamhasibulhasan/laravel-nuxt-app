<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //product page show
    public function index(){
        return view('layouts.product.product.index');
    }
    //add new product page show
    public function addNewProduct(){
        $all_data = Category::all();
        return view('layouts.product.product.addNewProduct', [
            'all_data'    =>  $all_data,
        ]);
    }

}
