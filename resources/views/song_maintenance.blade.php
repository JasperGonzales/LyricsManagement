@extends('dashboard')

@section('page-title')
{{$title}}
@stop

@section('custom-head')
@stop

@section('dashboard-content')
<form id="song-form">
    <div class="container-fluid" style="padding-top:20px">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-1">
                            <label for="title"><h5>Title <span class="text-danger">*</span></h5></label>
                        </div> 
                        <div class="col-md-11">
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
                        <div class="col-md-1">
                            <label for="artist"><h5>Artist <span class="text-danger">*</span></h5></label>
                        </div> 
                        <div class="col-md-11">
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
                        <div class="col-md-1">
                            <label for="lyrics"><h5>Lyrics <span class="text-danger">*</span></h5></label>
                        </div> 
                        <div class="col-md-11" style="">
                            <textarea class="form-control" style="box-sizing:border-box" id="lyrics" required></textarea>
                        </div> 
                    </div> 
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" id="btn-save" type="submit" value="{{$is_insert}}">Save</button>
            </div>
        </div>
    </div>
</form>
@stop

@section('custom-js')
<script src="{{ asset('js/songmaintenance.js') }}"></script>
@stop