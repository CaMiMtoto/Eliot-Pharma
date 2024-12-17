<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss','resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app" class="d-flex min-vh-100 flex-column justify-content-between">
    <div class="flex-grow-1">
        <x-navbar/>

        <main class="">
            @yield('content')
            @if(isset($slot))
                {{ $slot }}
            @endif

        </main>
    </div>
    <x-footer/>
</div>

</body>
</html>
