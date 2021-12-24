(function ($){
    $(document).ready(function (){
//=======================================================

//    Logout Features
    $(document).on('click', '#logout_btn', function (e){
        e.preventDefault();
        $('#logout_form').submit();
    });

//add new category modal view
        $(document).on('click', '#add_new_cat_btn', function (e){
            e.preventDefault();
            $('#add_new_cat_modal').modal('show');
        });
//        add new category table
        $(document).ready( function () {
            $('#add_new_cat_tbl').DataTable();
            $('#all_products_tbl').DataTable();
            $('#add_new_brand_tbl').DataTable();
            $('#add_new_tag_tbl').DataTable();
        } );


//        CK Editor Load
        CKEDITOR.replace( 'product_description' );

//        Category table show
        $('#add_new_cat_tbl').DataTable({
            processing:true,
            serverSide:true,
            ajax: {
                url: '/dashboard/category'
            },
            columns:[
                {
                    data:'id',
                    name:'id'
                },
                {
                    data:'name',
                    name:'name'
                },
                {
                    data:'status',
                    name:'status',
                    render:function (data, type, full, meta){
                        return `
                            <div class="status-toggle">
                                <input ${data == 1 ? 'checked="checked"':''} value="${data}" type="checkbox" status_id="${full.id}" id="cat_status_${full.id}" class="check cat-check">
                                <label for="cat_status_${full.id}" class="checktoggle">checkbox</label>
                            </div>
                         `;
                    }
                },
                {
                    data:'action',
                    name:'action'
                },
                {
                    data:'parent',
                    name:'parent'
                }
            ]
        });

//        Category status update
        $(document).on('change', '.cat-check', function (e){
            let id = $(this).attr('status_id');
            // alert(id);
            $.ajax({
                url: '/cat-status/'+ id,
                success: function (data) {

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        title: data,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    // alert(data);
                    $('#add_new_cat_tbl').DataTable().ajax.reload();
                }
            });
        });

//        add new category
        $(document).on('submit', '#add_new_cat_form', function (e){
            e.preventDefault();
            $.ajax({
                url: '/dashboard/addcat',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data){
                    if(data == 0){
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            title: "Category name is missing!",
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            title: "Category added successful!",
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#add_new_cat_form')[0].reset();
                        $('#add_new_cat_tbl').DataTable().ajax.reload();
                        $('#add_new_cat_modal').modal('hide');
                    }
                }
            });
        });

//        Category delete
        $(document).on('click', '#cat_delete_btn', function (e){
            e.preventDefault();
            let id = $(this).attr('del-cat-id');
            // alert(id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/cat-delete/'+ id,
                        success:function (data){
                            Swal.fire({
                                toast:true,
                                position: 'top-end',
                                icon: 'success',
                                title: data+' has been deleted',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#add_new_cat_tbl').DataTable().ajax.reload();
                        }
                    });

                }
            })

        });

//        Category edit
        $(document).on('click', '#cat_edit_btn', function (e){
            e.preventDefault();
            let id = $(this).attr('edit-cat-id')
            $('#edit_cat_modal').modal('show');
            $.ajax({
                url:'/cat-edit/'+id,
                success:function (data){
                    $('#name').val(data['name']);
                    $('#id').val(id);
                    cat_id = (data['cat']);
                    $('#edit_parent option')
                        .removeAttr('selected')
                        .filter(`[value = ${cat_id}]`)
                        .attr('selected', true)
                }
            });
        });

//        Update category
        $(document).on('submit', '#edit_cat_form', function (e){
            e.preventDefault();
            let id = $("#id").val();
            // alert(id);
            $.ajax({
                url:'/cat-update/'+id,
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success:function (data){
                    Swal.fire({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        title: "Category updated successful!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#edit_cat_form')[0].reset();
                    $('#edit_cat_modal').modal('hide');
                    $('#add_new_cat_tbl').DataTable().ajax.reload();
                }
            });
        });


        //        Brand table show
        $('#add_new_brand_tbl').DataTable({
            processing:true,
            serverSide:true,
            ajax: {
                url: '/dashboard/brand'
            },
            columns:[
                {
                    data:'id',
                    name:'id'
                },
                {
                    data:'name',
                    name:'name'
                },
                {
                    data:'status',
                    name:'status',
                    render:function (data, type, full, meta){
                        return `
                            <div class="status-toggle">
                                <input ${data == 1 ? 'checked="checked"':''} value="${data}" type="checkbox" status_id="${full.id}" id="brand_status_${full.id}" class="check brand-check">
                                <label for="brand_status_${full.id}" class="checktoggle">checkbox</label>
                            </div>
                         `;
                    }
                },
                {
                    data:'action',
                    name:'action'
                }
            ]
        });
        //add new brand modal view
        $(document).on('click', '#add_new_brand_btn', function (e){
            e.preventDefault();
            $('#add_new_brand_modal').modal('show');
        });
        //        add new brand
        $(document).on('submit', '#add_new_brand_form', function (e){
            e.preventDefault();
            $.ajax({
                url: '/dashboard/addbrand',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data){
                    if(data == 0){
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            title: "Category name is missing!",
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            title: "Category added successful!",
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#add_new_brand_form')[0].reset();
                        $('#add_new_brand_tbl').DataTable().ajax.reload();
                        $('#add_new_brand_modal').modal('hide');
                    }
                }
            });
        });
        //        Brand status update
        $(document).on('change', '.brand-check', function (e){
            let id = $(this).attr('status_id');
            // alert(id);
            $.ajax({
                url: '/brand-status/'+ id,
                success: function (data) {

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        title: data,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    // alert(data);
                    $('#add_new_brand_tbl').DataTable().ajax.reload();
                }
            });
        });
        //        Brand edit
        $(document).on('click', '#brand_edit_btn', function (e){
            e.preventDefault();
            let id = $(this).attr('edit-brand-id')
            $('#edit_brand_modal').modal('show');
            // alert(id);
            $.ajax({
                url:'/brand-edit/'+id,
                success:function (data){
                    // console.log(data);
                    $('#brand_name').val(data['name']);
                    $('#brand_id').val(id);
                }
            });
        });
        //        Update brand
        $(document).on('submit', '#edit_brand_form', function (e){
            e.preventDefault();
            let id = $("#brand_id").val();
            // alert(id);
            $.ajax({
                url:'/brand-update/'+id,
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success:function (data){
                    Swal.fire({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        title: "Brand updated successful!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#edit_brand_form')[0].reset();
                    $('#edit_brand_modal').modal('hide');
                    $('#add_new_brand_tbl').DataTable().ajax.reload();
                }
            });
        });
        //        Brand delete
        $(document).on('click', '#brand_delete_btn', function (e){
            e.preventDefault();
            let id = $(this).attr('del-brand-id');
            // alert(id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/brand-delete/'+ id,
                        success:function (data){
                            Swal.fire({
                                toast:true,
                                position: 'top-end',
                                icon: 'success',
                                title: data+' has been deleted',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#add_new_brand_tbl').DataTable().ajax.reload();
                        }
                    });

                }
            })

        });



        //        Tag table show
        $('#add_new_tag_tbl').DataTable({
            processing:true,
            serverSide:true,
            ajax: {
                url: '/dashboard/tag'
            },
            columns:[
                {
                    data:'id',
                    name:'id'
                },
                {
                    data:'name',
                    name:'name'
                },
                {
                    data:'status',
                    name:'status',
                    render:function (data, type, full, meta){
                        return `
                            <div class="status-toggle">
                                <input ${data == 1 ? 'checked="checked"':''} value="${data}" type="checkbox" status_id="${full.id}" id="tag_status_${full.id}" class="check tag-check">
                                <label for="tag_status_${full.id}" class="checktoggle">checkbox</label>
                            </div>
                         `;
                    }
                },
                {
                    data:'action',
                    name:'action'
                }
            ]
        });

        //add new tag modal view
        $(document).on('click', '#add_new_tag_btn', function (e){
            e.preventDefault();
            $('#add_new_tag_modal').modal('show');
        });


        //        add new tag
        $(document).on('submit', '#add_new_tag_form', function (e){
            e.preventDefault();
            $.ajax({
                url: '/dashboard/addtag',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data){
                    // alert(data);
                    if(data == 0){
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            title: "Tag name is missing!",
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            title: "Tag added successful!",
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#add_new_tag_form')[0].reset();
                        $('#add_new_tag_tbl').DataTable().ajax.reload();
                        $('#add_new_tag_modal').modal('hide');
                    }
                }
            });
        });

        //        Tag status update
        $(document).on('change', '.tag-check', function (e){
            let id = $(this).attr('status_id');
            // alert(id);
            $.ajax({
                url: '/tag-status/'+ id,
                success: function (data) {

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        title: data,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    // alert(data);
                    $('#add_new_tag_tbl').DataTable().ajax.reload();
                }
            });
        });


        //        Brand delete
        $(document).on('click', '#tag_delete_btn', function (e){
            e.preventDefault();
            let id = $(this).attr('del-tag-id');
            // alert(id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/tag-delete/'+ id,
                        success:function (data){
                            Swal.fire({
                                toast:true,
                                position: 'top-end',
                                icon: 'success',
                                title: data+' has been deleted',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#add_new_tag_tbl').DataTable().ajax.reload();
                        }
                    });

                }
            })

        });


        //        Tag edit
        $(document).on('click', '#tag_edit_btn', function (e){
            e.preventDefault();
            let id = $(this).attr('edit-tag-id')
            $('#edit_tag_modal').modal('show');
            // alert(id);
            $.ajax({
                url:'/tag-edit/'+id,
                success:function (data){
                    // console.log(data);
                    $('#tag_name').val(data['name']);
                    $('#tag_id').val(id);
                }
            });
        });
        //        Update tag
        $(document).on('submit', '#edit_tag_form', function (e){
            e.preventDefault();
            let id = $("#tag_id").val();
            // alert(id);
            $.ajax({
                url:'/tag-update/'+id,
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success:function (data){
                    Swal.fire({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        title: "Tag updated successful!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#edit_tag_form')[0].reset();
                    $('#edit_tag_modal').modal('hide');
                    $('#add_new_tag_tbl').DataTable().ajax.reload();
                }
            });
        });






//=============================================================
    });

})(jQuery)
