<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>
    <body>
        @yield('page-content')

        
        @yield('page-modal')
        
		<!-- Start: Scripts -->
		@include('includes.scripts')
    </body>
</html>
