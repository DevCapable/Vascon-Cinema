<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') page</title>

       {{-- Laravel Mix - CSS File --}}
       {{-- <link rel="stylesheet" href="{{ mix('css/client.css') }}"> --}}
        @extends('client::layouts.styles')
    </head>
    <body data-theme="light">
    @extends('client::layouts.app')
{{--    @extends('client::layouts.styles')--}}
        @yield('content')

        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/client.js') }}"></script> --}}
    @extends('client::layouts.footer')
    @extends('client::layouts.script')
    </body>
</html>
