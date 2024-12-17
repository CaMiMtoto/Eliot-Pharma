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
        <header class="bg-white border-bottom py-2 ">
            <div class="container">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-2">
                    <div class="d-flex flex-column flex-lg-row  align-items-center  gap-2">
                        <a class="text-muted small d-inline-flex align-items-center" href="tel:+250 788 308 557"> Call
                            us:
                            +250 788 308 557</a>
                        <a class="text-muted small d-inline-flex align-items-center"
                           href="mailto:eliotpharma@gmail.com">eliotpharma@gmail.com</a>
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
                <button class="navbar-toggler shadow-none border-0 rounded-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{--  <ul class="navbar-nav mx-auto">

                      </ul>--}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mx-auto gap-4">
                        <li class="nav-item">
                            <form action="{{ route('products') }}" method="get" class="position-relative">
                                <input type="text" name="search"
                                       class="form-control form-control-lg rounded-1 tw-text-sm lg:tw-w-96"
                                       placeholder="Search .." aria-label="Search"/>
                                <x-lucide-search
                                    class="tw-absolute tw-inset-y-0 tw-top-2  tw-right-2 tw-flex tw-items-center tw-pr-2 tw-text-gray-400 tw-h-6 tw-w-6"/>
                            </form>
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
    <footer class="tw-text-sm tw-font-medium bg-light border-top pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <img src="{{ asset('assets/media/logos/logo-sm.jpg') }}" alt="Logo" class="tw-h-10"/>
                    <div class="text-primary-emphasis fw-semibold">EliotPharma</div>
                    <p class="text-muted mt-2 tw-text-sm tw-tracking-wide tw-leading-relaxed">
                        Providing trusted healthcare solutions for you and your family. Shop the best prescription
                        medicines, supplements, and health products at affordable prices.
                    </p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h5 class="text-primary-emphasis text-uppercase tw-tracking-wide fw-semibold">
                        Working Hours
                    </h5>
                    <ul class="tw-list-disc py-1 ps-2">
                        @foreach($working_days as $day)
                            <li class="tw-text-sm bg-transparent text-muted tw-leading-relaxed py-1">{{ $day->day }}
                                ({{ date('h:i A', strtotime($day->opening_time))}}
                                - {{ date('h:i A', strtotime($day->closing_time))}})
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h5 class="text-primary-emphasis text-uppercase tw-tracking-wide fw-semibold">
                        Contact Information
                    </h5>
                    <p>
                        <x-lucide-map-pin class="text-primary tw-inline-block tw-mr-1 tw-h-5"/>
                        Kigali-Rwanda Nyarugenge City MarketDoor NO GF-59
                    </p>
                    <p>
                        <x-lucide-map-pinned class="text-primary tw-inline-block tw-mr-1 tw-h-5"/>
                        P.O.Box 7425,
                    </p>
                    <p>
                        <a href="mailto:eliotpharma@gmail.com">
                            <x-lucide-mail class="text-primary tw-inline-block tw-mr-1 tw-h-5"/>
                            <span class="text-dark">eliotpharma@gmail.com</span>
                        </a>
                    </p>
                    <p>
                        <a href="mailto:+250 788 308 557">
                            <x-lucide-phone-call class="text-primary tw-inline-block tw-mr-1 tw-h-5"/>
                            <span class="text-dark">+250 788 308 557</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <section class="bg-primary tw-p-4  tw-text-gray-100 ">
            <div class="container d-flex flex-column gap-2 flex-lg-row justify-content-between align-items-center">
                <div class="d-flex gap-2">
                    <span>Follow Us</span>
                    <x-lucide-instagram class="tw-h-5 tw-w-5"/>
                    <x-lucide-facebook class="tw-h-5 tw-w-5"/>
                    <x-lucide-twitter class="tw-h-5 tw-w-5"/>
                </div>
                <div>
                    <p class="tw-text-gray-100 tw-text-center mb-0">
                        &copy; {{ date('Y') }} Eliot Pharma
                    </p>
                </div>
            </div>
        </section>
    </footer>
</div>

</body>
</html>
