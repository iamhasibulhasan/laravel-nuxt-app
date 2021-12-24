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
                                <li class="breadcrumb-item active">All products</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <a href="{{route('product.add')}}" type="button" class="btn btn-light btn-sm">Add new products</a>
                <a href="{{route('product.trashview')}}" type="button" class="btn btn-light btn-sm">Trash</a><br><br>


                {{--                All products show--}}
                <div class="row card">
                    <div class="col-12 card-body">
                        <table id="all_products_tbl" class="display">
                            <thead>
                            <tr>
                                <th>#SI</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>

        </div>
    </div>
</div>

@endsection


