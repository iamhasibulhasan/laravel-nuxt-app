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
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <a href="{{route('product.index')}}" type="button" class="btn btn-light btn-sm">All products</a>
                <a href="{{route('product.trashview')}}" type="button" class="btn btn-light btn-sm">Trash</a>


                <form id="add_new_product_form" method="POST">
                    @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </div><br>
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Product Name</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="text" placeholder="Example- Red T-shirt XL" name="product_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Description</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <textarea name="product_description" id="product_description"></textarea>
                                    </div>
                                </div>
                            </div>


                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Simple Product</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="#">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">SKU</label>
                                                <div class="col-lg-9">
                                                    <input name="sku" placeholder="unique field" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Regular Price</label>
                                                <div class="col-lg-9">
                                                    <input name="regular_price" placeholder="it's number" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Sale Price</label>
                                                <div class="col-lg-9">
                                                    <input name="sale_price" placeholder="it's number" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Stock Quantity</label>
                                                <div class="col-lg-9">
                                                    <input name="stock_quantity" placeholder="it's number" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Status</label>
                                                <div class="col-lg-9">
                                                    <select name="status" class="select">
                                                        <option>Select Status</option>
                                                        <option value="0">Unpublished</option>
                                                        <option value="1">Published</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>



                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">Add Categories</h5>
                                        <a href="{{route('cat-page')}}" type="button" class="btn btn-light btn-sm">Create category</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">

                                        @foreach($all_cat as $cat)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="category[]" value="{{$cat->id}}"> {{$cat->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">Add Brands</h5>
                                        <a href="{{route('brand.index')}}" type="button" class="btn btn-light btn-sm">Create brand</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        @foreach($all_brand as $brand)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="brand[]" value="{{$brand->id}}"> {{$brand->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">Add Tags</h5>
                                        <a href="{{route('tag.index')}}" type="button" class="btn btn-light btn-sm">Create tag</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        @foreach($all_tag as $tag)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tag[]" value="{{$tag->id}}"> {{$tag->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Product Image</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group text-center">
{{--                                            <img style="width: 70%; cursor: pointer;" id="product_img_load" src="" alt="">--}}
                                            <label for="product_img"><img id="product_img_load" style="width: 70%; cursor: pointer;" src="{{URL::to('admin/assets/img/img-icon.png')}}" alt=""></label>
                                            <input type="file" name="product_img" id="product_img" class="form-control">
                                            <small class="text-secondary">1 image recommended. Size <b>1000px x 1000px</b></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

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
                                    @foreach($all_cat as $cat)
                                        <option value="{{$cat->id}}">{{ $cat->name }}</option>
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
