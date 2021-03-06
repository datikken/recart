<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Recart.me') }}</title>

    <script
        src="https://polyfill.io/v3/polyfill.min.js?features=smoothscroll,NodeList.prototype.forEach,Promise,Object.values,Object.assign"
        defer>
    </script>

    {{--Fonts--}}
    <link rel="preload" href="/fonts/Montserrat-Medium.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="/fonts/Montserrat-Regular.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="/fonts/Montserrat-semibold.ttf" as="font" type="font/ttf" crossorigin>
    {{--Favicon--}}
    <link href="/images/icons/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    {{--VendorStyles--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.15/dist/css/uikit.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.15/dist/js/uikit.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/vendors/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/pagination.min.css') }}">
    {{--MainStyles--}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="font-sans antialiased">

@routes
@inertia

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
