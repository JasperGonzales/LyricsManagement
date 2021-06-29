{{-- jQuery Plugin --}}
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Plugins: Bootstrap Popper -->
<script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}"></script>
<!-- Plugins: Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Plugins: Bootstrap Select -->
<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<!-- Plugins: iziModal -->
<script src="{{ asset('plugins/iziModal/js/iziModal.min.js') }}"></script>
<!-- Plugins: SweetAlert -->
<script src="{{ asset('plugins/sweetAlert/sweetalert.min.js') }} "></script>
<!-- Plugins: jQuery Validate -->
<script src="{{ asset('plugins/jquery-validate/jquery.validate.min.js') }}"></script>
<!-- Plugins: DataTables -->
<script src="{{ asset('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>

<!-- Template CSS -->
<script src="{{ asset('plugins/template/js/all.min.js') }}" crossorigin="anonymous"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('custom-js')