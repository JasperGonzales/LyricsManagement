@extends('main')

@section('page-title')
Dashboard
@stop

@section('custom-head')
    {{-- <link href="{{ asset('plugins/template/css/datatable_style.css') }}" rel="stylesheet" /> --}}
@stop

@section('page-content')

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Song Management</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                {{-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" /> --}}
                {{-- <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> --}}
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#" id="btn-logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    
                    <div class="card mb-4">
                        <div class="card-header">
                        <div class="row">
                                <div class="col-md-10">
                                    <i class="fas fa-table me-1"></i>
                                    List of Songs
                                </div>
                                <div class="col-md-2 text-right">
                                    <button id="btn-add-song" class="btn btn-primary"><i class="fas fa-plus"></i> Add Song</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="song-datatable" class="dataTable hover stripe">
                                <thead>
                                    <tr>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Artist</th>
                                        <th class="text-center">Lyrics</th>
                                        <th class="text-center"><i class="fas fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($song_list))
                                        @foreach ($song_list as $index => $value)
                                            <tr style="border:1px solid black">
                                                <td class="text-center" style="vertical-align:middle">{{$value['title']}}</td>
                                                <td class="text-center" style="vertical-align:middle">{{$value['artist']}}</td>
                                                <td style="vertical-align:middle"><pre>{{$value['lyrics']}}</pre></td>
                                                <td class="text-center" style="vertical-align:middle">
                                                    <a href="#" class="btn btn-edit" value="{{$value['id']}}"><i class="fas fa-edit fa-lg"></i></a><br/>
                                                    <a href="#" class="btn btn-delete" value="{{$value['id']}}"><i class="fas fa-trash fa-lg "></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; 2021</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@stop()

@section('page-modal')
<div class="modal fade" id="song-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="width:100%" role="document">
        <div class="modal-content">
        <div class="modal-header text-center">
            <h3 class="modal-title" id="modal-title"></h3>
        </div>
        <div class="modal-body">
            <form id="song-form">
                <div class="container-fluid" style="padding-top:20px">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="title"><h6>Title <span class="text-danger">*</span></h6></label>
                                    </div> 
                                    <div class="col-md-10">
                                        <input class="form-control" id="title" placeholder="" required/>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="artist"><h6>Artist <span class="text-danger">*</span></h6></label>
                                    </div> 
                                    <div class="col-md-10">
                                        <input class="form-control" id="artist" placeholder="" required/>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="lyrics"><h6>Lyrics <span class="text-danger">*</span></h6></label>
                                    </div> 
                                    <div class="col-md-10" style="">
                                        <textarea class="form-control" style="box-sizing:border-box" id="lyrics" required></textarea>
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="close-modal">Close</button>
            <button class="btn btn-success" id="btn-save" type="submit" value="1">Save</button>
        </div>
        </div>
    </div>
</div>
@stop

@section('custom-js')

<script src="{{ asset('plugins/template/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('plugins/template/js/scripts.js') }}"></script>
{{-- <script src="{{ asset('plugins/template/js/simple_datatable.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('plugins/template/js/datatables-simple-demo.js') }}"></script> --}}
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/songmaintenance.js') }}"></script>
@stop