$(document).ready(function(){
    $('#btn-login').on('click',function(){
        check_user();
    });
});

function check_user(){
    var username = $('#username').val();
    var password = $('#password').val();

    if (username != '' && password != '') {
        $.ajax({
            url     : 'check_user',
            type    : 'POST',
            data    : {
                username : username,
                password : password
            }
        })
        .done(function (response) {
            if (response == 1) {
                window.location.href = 'dashboard';
            }
            else{
                swal('Error','Invalid Username or Password. Please Try Again.','error');
            }
        })
        .fail(function(){
            swal('Error','There is something wrong. Please try again.','error');
        });
    }
    else { 
        swal('Error','There is something wrong. Please try again.','error');
    }
}