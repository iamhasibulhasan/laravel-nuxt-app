<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

//    view category page
    public function categoryPage(){

        $all_data = Category::all();
        if(request()->ajax()){
            return datatables()->of(Category::latest()->get())->addColumn('action', function ($data){
                $output = '<a class="btn btn-warning" id="cat_edit_btn" edit-cat-id="'.$data['id'].'" ><i class="fas fa-edit"></i></a>';
                $output .= ' <a class="btn btn-danger" id="cat_delete_btn" del-cat-id="'.$data['id'].'" ><i class="fas fa-trash"></i></a>';
                return $output;
            })->addColumn('parent', function ($data){
                $output = Category::where('id', $data['parent']) ->get();
                $all_data = json_decode($output);
                foreach ($all_data as $data){
                    return $data->name;

                }
            })->rawColumns(['action','parent'])->make(true);
        }
        return view('layouts.product.category.index', [
            'all_data'    =>  $all_data,
        ]);
    }


//    Store new category
    public function storeCategory(Request $request){

        $parent = NULL;
        if ($request->name == ""){
            return 0;
        }else{
            Category::create([
                'name'          =>  $request->name,
                'parent'        =>  (!empty($request->parent)) ? $request->parent : NULL,
            ]);
            return 1;
        }
    }


    //    Category Status update
    public function statusUpdate($id){
        $status = Category::find($id);
//        return $status;
        if ($status->status == true){
            $status->status = false;
            $status->update();
            return "Category deactivate successful.";
        }else{
            $status->status = true;
            $status->update();
            return "Category activate successful.";
        }
    }

//    category delete
    public function destroy($id){
        $delete_data = Category::find($id);
        $cat_name = $delete_data->name;
        $delete_data->delete();
        return $cat_name;
    }
//    Category edit
public function edit($id){
        $data = Category::find($id);
        return [
            'name'   =>  $data->name,
            'cat'    =>  $data->parent
        ];
}

// Category update
public function update(Request $request, $id){

        $data = Category::find($id);
//        return $data;
        $data->name = $request->edit_cat_name;

        if($request->edit_parent != ""){
            $data->parent = $request->edit_parent;
        }

        $data->update();
}


}
