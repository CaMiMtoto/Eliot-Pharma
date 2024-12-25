<div id="kt_app_header" class="app-header">
    <!--begin::Header primary-->
    <div class="app-header-primary"
         style=" background-image: url({{ asset('assets/media/misc/layout/header-bg.png') }});"
         data-kt-sticky="true" data-kt-sticky-name="app-header-primary-sticky"
         data-kt-sticky-offset="{default: 'false', lg: '300px'}">
        <!--begin::Header primary container-->
        <div class="app-container container-xxl d-flex align-items-stretch justify-content-between">
            <!--begin::Logo and search-->
            <div class="d-flex flex-grow-1 flex-lg-grow-0">
                <!--begin::Logo wrapper-->
                <div class="d-flex align-items-center" id="kt_app_header_logo_wrapper">
                    <!--begin::Header toggle-->
                    <button class="d-lg-none btn btn-icon btn-color-white btn-active-color-primary ms-n4 me-sm-2"
                            id="kt_app_header_menu_toggle">
                        <x-lucide-menu class="tw-h-16 tw-w-16"/>
                    </button>
                    <!--end::Header toggle-->
                    <!--begin::Logo-->
                    <a href="" class="d-flex align-items-center  mb-lg-0 pt-lg-1">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo-sm.jpg')}}"
                             class="d-block d-sm-none tw-h-10"/>
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo.jpg') }}"
                             class="d-none d-sm-block tw-h-16"/>
                    </a>
                    <!--end::Logo-->
                </div>
                <!--end::Logo wrapper-->
            </div>
            <!--end::Logo and search-->
            <!--begin::Navbar-->
            <div class="app-navbar">
                <!--begin::User menu-->
                <div class="app-navbar-item ms-3 me-6" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-35px"
                         data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                         data-kt-menu-placement="bottom-end">
                        <img class="symbol symbol-35px" src="{{ asset('assets/media/avatars/300-3.jpg') }}" alt="user"/>
                    </div>
                    <!--begin::User account menu-->
                    <div
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="{{ asset('assets/media/avatars/300-3.jpg') }}"/>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">
                                        {{ auth()->user()->name }}
                                    </div>
                                    <div class="fw-semibold text-muted small text-hover-primary fs-7 text-wrap">
                                        {{ auth()->user()->email }}
                                    </div>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="" class="menu-link px-5">My Profile</a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                             data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                            <a href="#" class="menu-link px-5">
												<span class="menu-title position-relative">Mode
												<span class="ms-5 position-absolute translate-middle-y top-50 end-0">
													<i class="ki-duotone ki-night-day theme-light-show fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
														<span class="path5"></span>
														<span class="path6"></span>
														<span class="path7"></span>
														<span class="path8"></span>
														<span class="path9"></span>
														<span class="path10"></span>
													</i>
													<i class="ki-duotone ki-moon theme-dark-show fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span></span>
                            </a>
                            <!--begin::Menu-->
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                data-kt-menu="true" data-kt-element="theme-mode-menu">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                       data-kt-value="light">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-duotone ki-night-day fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
																<span class="path4"></span>
																<span class="path5"></span>
																<span class="path6"></span>
																<span class="path7"></span>
																<span class="path8"></span>
																<span class="path9"></span>
																<span class="path10"></span>
															</i>
														</span>
                                        <span class="menu-title">Light</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-duotone ki-moon fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                                        <span class="menu-title">Dark</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                       data-kt-value="system">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-duotone ki-screen fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
																<span class="path4"></span>
															</i>
														</span>
                                        <span class="menu-title">System</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5 my-1">
                            <a href="" class="menu-link px-5">Account Settings</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}" class="menu-link px-5"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign Out
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->

                <!--begin::Header menu toggle-->
                <!--end::Header menu toggle-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header primary container-->
    </div>
    <!--end::Header primary-->
    <!--begin::Header secondary-->
    <div class="app-header-secondary">
        <!--begin::Header secondary container-->
        <div class="app-container container-xxl d-flex align-items-stretch">
            <!--begin::Menu wrapper-->
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch flex-grow-1" data-kt-drawer="true"
                 data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                 data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
                 data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                 data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                 data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <!--begin::Menu-->
                <div
                    class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                    id="kt_app_header_menu" data-kt-menu="true">

                    <a href="" class="menu-item  menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                        <span class="menu-link">
                            <span class="menu-icon"><x-lucide-gauge class="tw-h-6 tw-w-6"/></span>
                            <span class="menu-title">Dashboard</span>
                        </span>
                    </a>
                    @can(\App\Constants\AppPermission::MANAGE_CATEGORIES)
                        <a href="{{ route('admin.categories.index') }}"
                           class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2 {{ \Illuminate\Support\Facades\Route::is('admin.categories.*') ? 'here' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon"><x-lucide-group class="tw-h-6 tw-w-6"/></span>
                            <span class="menu-title">Categories</span>
                        </span>
                        </a>
                    @endcan
                    @can(\App\Constants\AppPermission::MANAGE_PRODUCTS)
                        <a href="{{ route('admin.products.index') }}"
                           class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2 {{ \Illuminate\Support\Facades\Route::is('admin.products.*') ? 'here' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon"><x-lucide-pill-bottle class="tw-h-6 tw-w-6"/></span>
                            <span class="menu-title">Products</span>
                        </span>
                        </a>
                    @endcan
                    @can(\App\Constants\AppPermission::MANAGE_WORKING_HOURS)
                        <a href="{{ route('admin.working-hours.index') }}"
                           class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2 {{ \Illuminate\Support\Facades\Route::is('admin.working-hours.*') ? 'here' : '' }}">
                        <span class="menu-link">
                            <span class="menu-icon"><x-lucide-calendar-clock class="tw-h-6 tw-w-6"/></span>
                            <span class="menu-title">Working Hours</span>
                        </span>
                        </a>
                    @endcan

                    @canany([\App\Constants\AppPermission::MANAGE_ROLES,\App\Constants\AppPermission::MANAGE_ROLES,\App\Constants\AppPermission::MANAGE_USERS])
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                             data-kt-menu-placement="bottom-start"
                             class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2  {{ \Illuminate\Support\Facades\Route::is('admin.system.*') ? 'here' : '' }}">
                            <!--begin:Menu link-->
                            <span class="menu-link ">
                            <span class="menu-icon"><x-lucide-settings class="tw-h-6 tw-w-6"/></span>
                            <span class="menu-title">Settings</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px mt-5">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    @can(\App\Constants\AppPermission::MANAGE_USERS)
                                        <a class="menu-link" href="{{ route('admin.system.users.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">Users</span>
                                        </a>
                                    @endcan
                                    @can(\App\Constants\AppPermission::MANAGE_ROLES)
                                        <a class="menu-link" href="{{ route('admin.system.roles.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">Roles</span>
                                        </a>
                                    @endcan
                                    @can(\App\Constants\AppPermission::MANAGE_PERMISSIONS)
                                        <a class="menu-link " href="{{ route('admin.system.permissions.index') }}">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">Permissions</span>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    @endcanany
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Menu wrapper-->
            <!--begin::Search-->
            <div class="d-flex align-items-center w-100 w-lg-225px pt-5 pt-lg-0">
                <!--begin::Search-->

                <!--end::Search-->
            </div>
            <!--end::Search-->
        </div>
        <!--end::Header secondary container-->
    </div>
    <!--end::Header secondary-->
</div>
