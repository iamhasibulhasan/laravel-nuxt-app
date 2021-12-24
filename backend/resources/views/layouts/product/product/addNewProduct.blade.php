@extends('layouts.app')
@extends('layouts.header')
<div class="main-wrapper">
    <div class="page-wrapper">

        <div class="content container-fluid">
            <!-- Sidebar -->
        @extends('layouts.sidebar')

        @section('main-content')
            <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Add new product</li>
                            </ul>
                            <a href="{{route('product.index')}}" type="button" class="btn btn-light btn-sm">All products</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <form id="add_new_cat_form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Product Name</h5><hr/>
                                    <div class="form-group">
                                        <input type="text" placeholder="Example- Red T-shirt XL" name="name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Description</h5><hr/>
                                    <div class="form-group">
                                        <textarea id="product_description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h5 class="card-title">Add Categories</h5><hr/>
                                        @foreach($all_data as $data)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="checkbox" value="{{$data->id}}"> {{$data->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-block">Add</button>
                    </div>
                </form>

        </div>
    </div>
</div>

@endsection
{{--Edit category modal--}}
<div class="modal fade" id="edit_cat_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card">
                <div class="card-body">
                    <div class="modal-header">
                        <h3>Edit Category</h3>
                    </div>
                    <div class="modal-body">
                        <form id="edit_cat_form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" id="name" name="edit_cat_name" class="form-control">
                                <input type="hidden" id="id" name="id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Parent Category</label>
                                <select name="edit_parent" id="edit_parent" class="custom-select">
                                    <option value="">-select-</option>
                                    @foreach($all_data as $data)
                                        <option value="{{$data->id}}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
