@extends('layouts.app')
@section("title","Home")
@section('content')
    <div class="container my-4">
        <div class="row tw-h-[70vh] overflow-hidden">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div
                    class="bg-primary-subtle text-primary-emphasis text-uppercase text-center py-2 px-4 d-inline-flex rounded-5 tw-tracking-widest tw-text-xl tw-font-bold tw-leading-tight tw-text-left z-index-0 z-0"
                    style="clip-path: polygon(100% 0, 95% 50%, 100% 100%, 0% 100%, 5% 50%, 0% 0%);">
                    Your Health, Our Priority
                </div>
                <h1 class="display-1 ">
                    Affordable Healthcare, Anytime.
                </h1>
                <p class="lead tw-text-base tw-tracking-wide tw-leading-relaxed text-muted">
                    Providing trusted healthcare solutions for you and your family. Shop the best prescription
                    medicines, supplements, and health products at affordable prices.
                </p>
                <a href="{{ route('products') }}"
                   class="btn btn-primary btn-lg text-white px-4 rounded-pill tw-text-base text-uppercase py-3">
                    Browse Products
                </a>
            </div>
            <div class="col-md-4  col-lg-6 mx-auto">
                <img src="{{ asset('assets/media/home/rb_3825.png') }}" class="img-fluid" alt=""/>
            </div>
        </div>
        <section class="mt-4">
            <div class="text-center">
                <h3 class=""> What do you need today?</h3>
                <p class="text-muted">
                    Check our featured products and deals
                </p>
            </div>
            <div class="row">
                <div class="col-md-6 my-2">
                    <x-small-card :product="$frontProduct" :show-description="true"/>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        @foreach($featuredProducts as $product)
                            <div class="my-2 col-md-6">
                                <x-small-card :product="$product" :is-new="true"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="mb-4">
        <div class="container">
            @foreach($featuredCategories as $category)
                <div class="my-4 position-relative text-center">
                    <span class="tw-text-2xl text-center fw-bolder position-relative tw-z-10 bg-white w-auto px-4">
                       {{$category->name}}
                    </span>
                    <div
                        class="tw-bg-[#F8F8F8] tw-h-2 top-50 tw-w-full position-absolute tw-z-0 display-none d-lg-block"></div>
                </div>
                <div class="row">
                    @foreach($category->products as $product)
                        <div class="col-md-6 col-xl-3">
                            <x-small-card :product="$product"/>
                        </div>
                    @endforeach
                </div>

            @endforeach

            <div class="text-center mt-4">
                <a href="" class="btn btn-lg btn-primary py-3 rounded-pill tw-text-xs text-white px-4 text-uppercase">
                    View All Products
                    <x-lucide-move-right class="tw-h-5 tw-w-5"/>
                </a>
            </div>

        </div>
    </section>

    <livewire:subscribe-newsletter/>

@endsection
