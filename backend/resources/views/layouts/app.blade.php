<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin- Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome.min.css')}}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/select2.min.css')}}">
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/feathericon.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/plugins/morris/morris.css')}}">


    <!-- Data tables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">

    <!--[if lt IE 9]>
    <script src="{{asset('admin/assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>

@section('main-content')
    @show

<!-- jQuery -->
<script src="{{asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/fontawesome-kit.js')}}"></script>

<!-- Data tables JS -->
<script src="{{asset('admin/assets/js/jquery.dataTables.js')}}"></script>
<!-- CK Editor -->
{{--<script src="{{asset('admin/assets/js/ckeditor.js')}}"></script>--}}
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<!-- Slimscroll JS -->
<script src="{{asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Select2 JS -->
<script src="{{asset('admin/assets/js/select2.min.js')}}"></script>
<!-- Sweet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Custom JS -->
<script src="{{asset('admin/assets/js/script.js')}}"></script>
<script src="{{asset('admin/assets/js/custom.js')}}"></script>

</body>

</html>



