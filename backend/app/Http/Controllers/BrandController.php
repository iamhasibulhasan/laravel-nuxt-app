<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //    view category page
    public function index(){
        if(request()->ajax()){
            return datatables()->of(Brand::latest()->get())->addColumn('action', function ($data){
                $output = '<a class="btn btn-warning" id="brand_edit_btn" edit-brand-id="'.$data['id'].'" ><i class="fas fa-edit"></i></a>';
                $output .= ' <a class="btn btn-danger" id="brand_delete_btn" del-brand-id="'.$data['id'].'" ><i class="fas fa-trash"></i></a>';
                return $output;
            })->rawColumns(['action'])->make(true);
        }
        return view('layouts.product.brand.index');
    }
    //    Store new brand
    public function storeBrand(Request $request){

        if ($request->name == ""){
            return 0;
        }else{
            Brand::create([
                'name'          =>  $request->name
            ]);
            return 1;
        }
    }
    //    Brand Status update
    public function statusUpdate($id){
        $status = Brand::find($id);
//        return $status;
        if ($status->status == true){
            $status->status = false;
            $status->update();
            return "Brand deactivate successful.";
        }else{
            $status->status = true;
            $status->update();
            return "Brand activate successful.";
        }
    }
    //    Brand edit
    public function edit($id){
        $data = Brand::find($id);
        return [
            'name'   =>  $data->name,
        ];
    }
    // Brand update
    public function update(Request $request, $id){

        $data = Brand::find($id);
//        return $data;
        $data->name = $request->edit_brand_name;
        $data->update();
    }


    //    Brand delete
    public function destroy($id){
        $delete_data = Brand::find($id);
        $brand_name = $delete_data->name;
        $delete_data->delete();
        return $brand_name;
    }

}
