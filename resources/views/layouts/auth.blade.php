<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        @include('includes.frontsite.meta')
        
        <title>@yield('title') | MeetDoctor</title>

        @stack('before-style')

            @include('includes.frontsite.style')

        @stack('after-style')

    </head>
    <body>
        
            @yield('content')

        @include('components.frontsite.footer')

        @stack('before-script')

            @include('includes.frontsite.style')

        @stack('after-script')
    </body>
</html>