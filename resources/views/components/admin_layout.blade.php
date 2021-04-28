<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? '' }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- Fonts Kiwi Maru --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- Styles -->
    {{-- <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <x-_admin_navbar />

    <div id="app" class="pt-5">
        
        {{$slot}}

    </div>

    <!-- Scripts -->
    {{-- FontAwesome --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    {{-- <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script> --}}
    <script src="https://kit.fontawesome.com/f2c0942aa8.js" crossorigin="anonymous"></script>
    @stack('script')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>