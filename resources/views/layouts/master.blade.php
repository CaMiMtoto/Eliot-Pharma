<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <base href=""/>
    <title>
        {{ config('app.name') }} | @yield('title')
    </title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}"/>
    <!-- Scripts -->
    @vite(['resources/sass/master.scss', 'resources/js/master.js','resources/css/app.css'])
    @yield('styles')
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" data-kt-app-header-stacked="true" data-kt-app-header-primary-enabled="true"
      data-kt-app-header-secondary-enabled="true" data-kt-app-toolbar-enabled="true" class="app-default">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }</script>
<!--end::Theme mode setup on page load-->
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <!--begin::Header-->
        <x-app-header/>
        <!--end::Header-->
        <!--begin::Wrapper-->
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <!--begin::Wrapper container-->
            <div class="app-container container-xxl d-flex flex-row flex-column-fluid">
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar pt-lg-9 pt-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container"
                                 class="app-container container-fluid d-flex flex-stack flex-wrap">
                                <!--begin::Toolbar wrapper-->
                                @yield('toolbar')
                                <!--end::Toolbar wrapper-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content pb-0">
                            @yield('content')
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    <x-app-footer/>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::App-->
<!--begin::Drawers-->


<!--begin::Javascript-->
<script>const hostUrl = "assets/";</script>
{{--<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
@stack('scripts')--}}

<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
@livewireScripts
<script>
    // initialize pikaday .datepicker
    document.querySelectorAll('.datepicker').forEach(function (el) {
        new Pikaday({
            field: el,
            format: 'YYYY-MM-DD',
        });
    });
    document.querySelectorAll('.datetimepicker').forEach(function (el) {
        new Pikaday({
            field: el,
            format: 'YYYY-MM-DD HH:mm',
            timeFormat: 'HH:mm',
            defaultDate: new Date(),
            setDefaultDate: true,
        });
    });


    $(document).ready(function () {
        $(document).on('click', '.js-delete', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            let method = 'DELETE';
            let token = $('meta[name="csrf-token"]').attr('content');
            let data = {
                _token: token,
                _method: method
            };

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        data: data,
                        success: function (response) {
                            if (window.dt) {
                                window.dt.ajax.reload();
                            } else {
                                window.location.reload();
                            }
                        },
                        error: function (response) {
                            console.log(response);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong, please try again',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                    })
                }
            })

        })
    });
</script>
@stack('scripts')

</body>
<!--end::Body-->
</html>
