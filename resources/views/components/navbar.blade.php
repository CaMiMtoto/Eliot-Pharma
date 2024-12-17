<header {{ $attributes->class(['bg-white border-bottom py-2 ']) }}>
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
