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
                                <li class="breadcrumb-item active">Add new Tag</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <a class="btn btn-primary" id="add_new_tag_btn">Add new tag</a><br><br><br>

                {{--                All tag show--}}
                <div class="row card">
                    <div class="col-12 card-body">
                        <table id="add_new_tag_tbl" class="display">
                            <thead>
                            <tr>
                                <th>#SI</th>
                                <th>Name</th>
                                <th>Status</th>
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

<div class="modal fade" id="add_new_tag_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add new tag</h2>
            </div>
            <div class="modal-body">


                <form id="add_new_tag_form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tag Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-block">Add</button>
                    </div>
                </form>



            </div>
        </div>
    </div>
</div>
{{--Edit tag modal--}}
<div class="modal fade" id="edit_tag_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card">
                <div class="card-body">
                    <div class="modal-header">
                        <h3>Edit Tag</h3>
                    </div>
                    <div class="modal-body">
                        <form id="edit_tag_form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tag Name</label>
                                <input type="text" id="tag_name" name="edit_tag_name" class="form-control">
                                <input type="hidden" id="tag_id" name="id" class="form-control">
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
