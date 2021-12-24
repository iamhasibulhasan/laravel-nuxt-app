<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //product page show
    public function index(){
        if(request()->ajax()){
            return datatables()->of(Product::where('status', 1)->get())->addColumn('category', function ($data){
                $output = Category::whereIn('id', json_decode($data->category))->get();
                $all_cat = json_decode($output);
                $category="";
                foreach ($all_cat as $cat){
                    $category.=$cat->name.", ";
                }
                return substr(trim($category), 0, -1);
            })->addColumn('action', function ($data){
//                $output = '<a class="btn btn-warning" id="product_edit_btn" edit-product-id="'.$data['id'].'" ><i class="fas fa-edit"></i></a>';
                $output = ' <a class="btn btn-warning" id="product_trash_btn" trash-product-id="'.$data['id'].'" ><i class="fas fa-trash"></i></a>';
                return $output;
            })->rawColumns(['category', 'action'])->make(true);
        }
        return view('layouts.product.product.index');
    }
    //add new product page show
    public function addNewProduct(){
        $all_cat = Category::all();
        $all_brand = Brand::all();
        $all_tag = Tag::all();
        return view('layouts.product.product.addNewProduct', [
            'all_cat'    =>  $all_cat,
            'all_brand'    =>  $all_brand,
            'all_tag'    =>  $all_tag,
        ]);
    }

//    store products
    public function store( Request $request ){

        $product_image = '';
        if ($request->hasFile('product_img')){
            $image = $request->file('product_img');
            $product_image = md5(time().rand()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('media/product/'), $product_image);
            $img_with_path = 'media/product/'. $product_image;
        }
//        return $img_with_path;

//        required field validate
        if($request->product_name == ""){
            return "Product name required.";
        }else{
            $info = [
                'sku'                   =>  $request->sku,
                'regular_price'         =>  $request->regular_price,
                'sale_price'            =>  $request->sale_price,
                'stock_quantity'        =>  $request->stock_quantity,
            ];

            Product::create([
                'name'          =>  $request->product_name,
                'user_id'       =>  Auth::user()->id,
                'description'   =>  $request->product_description,
                'category'      =>  json_encode($request->category),
                'brand'         =>  json_encode($request->brand),
                'tag'           =>  json_encode($request->tag),
                'info'          =>  json_encode($info),
                'image'         =>  $img_with_path
            ]);

            return 1;
        }

    }

//    Product Move to trash
    public function trash($id){
        $trash = Product::find($id);

        if ($trash->status == 1){
            $trash->status = 0;
            $trash->update();
            return "Product move to trash";
        }else{
            $trash->status = 1;
            $trash->update();
            return "Product restore";
        }

    }

//    Trash page load
    public function trashView(){
        if(request()->ajax()){
            return datatables()->of(Product::where('status', 0)->get())->addColumn('action', function ($data){
                $output = '<a class="btn btn-success" id="product_trash_btn" trash-product-id="'.$data['id'].'" ><i class="fas fa-sign-in-alt"></i></a>';
                $output .= ' <a class="btn btn-danger" id="product_delete_btn" del-product-id="'.$data['id'].'" ><i class="fas fa-trash"></i></a>';
                return $output;
            })->rawColumns(['category', 'action'])->make(true);
        }
        return view('layouts.product.product.trash');
    }
    //    Product delete
    public function destroy($id){
        $delete_data = Product::find($id);
        $product_name = $delete_data->name;
        $delete_data->delete();
        return $product_name;
    }

}
