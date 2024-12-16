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
    <div id="app">
        <header class="bg-white border-bottom py-2 ">
            <div class="container">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-2">
                    <div class="d-flex flex-column flex-lg-row  align-items-center  gap-2">
                        <a class="text-muted small d-inline-flex align-items-center" href="tel:+250 788 308 557"> Call us: +250 788 308 557</a>
                        <a class="text-muted small d-inline-flex align-items-center" href="mailto:eliotpharma@gmail.com">eliotpharma@gmail.com</a>
                    </div>
                    <div class="fw-semibold tw-tracking-widest text-primary">
                        - HOME DELIVERY EVERYDAY IN KIGALI -
                    </div>
                    <div>
                        <a class="text-muted small d-inline-flex text-center align-items-center" href="">
{{--                            <x-lucide-map-pin name="shopping-cart" class="tw-h-4 tw-w-4" />--}}
                            <span>P.O.Box 7425, Kigali-Rwanda Nyarugenge City MarketDoor NO GF-59</span>
                        </a>
                    </div>
                </div>

            </div>
        </header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-none tw-drop-shadow-sm border-bottom">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                 <img src="{{ asset('assets/media/logos/logo-sm.jpg') }}" alt="Logo" class="tw-h-10"/>
                   <span class=" fw-bold text-primary">EliotPharma</span>
                </a>
                <button class="navbar-toggler shadow-none border-0 rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                  {{--  <ul class="navbar-nav mx-auto">

                    </ul>--}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mx-auto gap-4">
                        <li class="nav-item">
                            <input type="text" class="form-control form-control-lg rounded-1 tw-text-sm lg:tw-w-96" placeholder="Search .." aria-label="Search"/>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products') }}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
            @if(isset($slot))
                {{ $slot }}
            @endif

        </main>
    </div>
</body>
</html>
