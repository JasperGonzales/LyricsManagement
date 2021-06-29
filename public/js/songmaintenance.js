$(document).ready(function(){
    $('#song-form').validate();
    $('#btn-save').on('click',function(e){
        e.preventDefault();
        save_song();
    });

    $('#btn-add-song').on('click',function(){
        $('#modal-title').text('Add Song');
        $('#btn-save').val(1);
        
        
        $('#title').val('');
        $('#artist').val('');
        $('#lyrics').val('');

        $('#song-modal').modal('show');

    });

    $('#close-modal').on('click',function(){
        $('#song-modal').modal('hide');
    });


    $('#song-datatable').on('search.dt', function () {
        
        init_datatable_functions();
    });

    $('#song-datatable').on( 'page.dt', function () {
        init_datatable_functions();
    } );

    $('#song-datatable').DataTable();
});

function init_datatable_functions(){

    $('.btn-edit').unbind().on('click',function(){
        var id = $(this).attr('value');
        $('#modal-title').text('Edit Song');
        $('#btn-save').data('id',id);
        $('#btn-save').val(0);
        
        $('#title').val('');
        $('#artist').val('');
        $('#lyrics').val('');

        $('#song-modal').modal('show');
        get_song_detail(id);
    });

    $('.btn-delete').unbind().on('click',function(){
        var id = $(this).attr('value');
        swal({
            title: "Are you sure you want to delete this?",
            text: "",
            icon: "warning",
            buttons: {
                confirm: {
                    text: 'Delete',
                    value: true,
                },
                cancel: {
                    text: "Cancel",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: true,
                },
            }
        }).then((isConfirm) => {
            if (isConfirm) {
                $.ajax({
                    url: 'delete-song',
                    type: 'POST',
                    data: {
                        id : id
                    }
                })
                .done(function (response) {
                    swal({
                        title: "",
                        text: "Record Deleted.",
                        type: "success",
                        icon: "success",
                    }).then(function(){
                        get_song_list();
                    });
                })
                .fail(function () {
                    swal({
                        title: "Error",
                        text: "Something went wrong. Please Try Again.",
                        type: "error",
                        icon: "error",
                    });
                });
            }
        });
    });
}

function get_song_list() {
    
    $.ajax({
        url     : 'get-song-list',
        type    : 'POST',
        dataType: 'JSON'
    })
    .done(function(response){

        var list = response.list || '';
        datatable =  $('#song-datatable').DataTable();

        datatable.clear().draw();
        $.each(list,function(index,value){
            var row = datatable.row.add([
                value['title'],
                value['artist'],
                '<pre>' + value['lyrics'] + '</pre>',
                value['action']
            ]).draw();

            datatable.row(row).column(0).nodes().to$().addClass('text-center');
            datatable.row(row).column(1).nodes().to$().addClass('text-center');
            datatable.row(row).column(2).nodes().to$().addClass('text-left');
            datatable.row(row).column(3).nodes().to$().addClass('text-center');
        });

        init_datatable_functions();
    })
    .fail(function() {
        swal('Error','Something went wrong. Please Try Again.','error');
    });
}

function save_song() {
    if ($('#song-form').valid()) {
        $.ajax({
            url     : 'save-song',
            type    : 'POST',
            data    : {
                title       : $('#title').val(),
                artist      : $('#artist').val(),
                lyrics      : $('#lyrics').val(),
                id          : $('#btn-save').data('id'),
                is_insert   : $('#btn-save').val()
            }
        })
        .done(function(response){
            $('#song-modal').modal('hide');
            swal('Success','Song Save Successfully','success');

            get_song_list();
        })
        .fail(function() {
            swal('Error','Something went wrong. Please Try Again.','error');
        });
    }

}

function get_song_detail (id = 0) {
    $.ajax({
        url     : 'get-song-detail',
        type    : 'POST',
        dataType: 'JSON',
        data    : {
            id : id
        }
    })
    .done(function(response) {
        var title   = response.title    || '';
        var artist  = response.artist   || '';
        var lyrics  = response.lyrics   || '';

        $('#title').val(title);
        $('#artist').val(artist);
        $('#lyrics').val(lyrics);
    })
    .fail(function() {

    });
}