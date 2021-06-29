
<meta charset="UTF-8">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />

@yield('custom-head')

<!-- Page Title -->
<title>@yield('page-title')</title>


<!-- Plugins: Bootstrap -->
<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
<!-- Plugins: DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatable/css/jquery.dataTables.min.css') }}">
<!-- Plugins: Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

<!-- Template CSS -->
<link href="{{ asset('plugins/template/css/template_style.css') }}" rel="stylesheet" />
    
@yield('custom-css')

<!-- APP CSS -->
<link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
