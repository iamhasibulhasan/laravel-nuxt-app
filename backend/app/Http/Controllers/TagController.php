<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //    view category page
    public function index(){
        if(request()->ajax()){
            return datatables()->of(Tag::latest()->get())->addColumn('action', function ($data){
                $output = '<a class="btn btn-warning" id="tag_edit_btn" edit-tag-id="'.$data['id'].'" ><i class="fas fa-edit"></i></a>';
                $output .= ' <a class="btn btn-danger" id="tag_delete_btn" del-tag-id="'.$data['id'].'" ><i class="fas fa-trash"></i></a>';
                return $output;
            })->rawColumns(['action'])->make(true);
        }
        return view('layouts.product.tag.index');
    }


    //    Store new tag
    public function storeTag(Request $request){

//        return $request->name;
        if ($request->name == ""){
            return 0;
        }else{
            Tag::create([
                'name'          =>  $request->name
            ]);
            return 1;
        }
    }
    //    Brand Status update
    public function statusUpdate($id){
        $status = Tag::find($id);
//        return $status;
        if ($status->status == true){
            $status->status = false;
            $status->update();
            return "Tag deactivate successful.";
        }else{
            $status->status = true;
            $status->update();
            return "Tag activate successful.";
        }
    }


    //    Brand delete
    public function destroy($id){
        $delete_data = Tag::find($id);
        $tag_name = $delete_data->name;
        $delete_data->delete();
        return $tag_name;
    }
//    Tag edit
    public function edit($id){
        $data = Tag::find($id);
        return [
            'name'   =>  $data->name,
        ];
    }
    // tag update
    public function update(Request $request, $id){

        $data = Tag::find($id);
//        return $data;
        $data->name = $request->edit_tag_name;
        $data->update();
    }



}
