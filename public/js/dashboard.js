$(document).ready(function(){
    $('#btn-logout').on('click',function(){
        logout();
    });

});

function logout() {
    window.location.href = 'logout';
}