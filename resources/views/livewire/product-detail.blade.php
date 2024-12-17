<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="bg-light py-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $product->name }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-body rounded-1 tw-border-slate-200">
                    <img src="{{ $product->imageUrl }}" class="img-fluid" alt="{{ $product->name }}"/>
                </div>
            </div>
            <div class="col-lg-6">
                <h3 class="fw-bolder tw-leading-relaxed tw-tracking-wide">
                    {{ $product->name }}
                </h3>
                <h5 class="d-inline-flex gap-2 align-items-center text-primary fw-bolder">
                    RWF
                    @if($product->discount_percentage)
                        <del>
                            {{ number_format($product->real_price, 0) }}
                        </del>
                    @endif
                    <span>
                         {{ number_format($product->real_price,0) }}
                    </span>
                </h5>
                <p class="tw-text-sm text-muted tw-leading-relaxed tw-tracking-wide">
                    {{ $product->description }}
                </p>

                <div class="d-flex flex-column justify-content-between gap-2">
                    <div>
                        <div class="text-muted text-uppercase">
                            Category:
                        </div>
                        <div class="fw-bold">
                            {{ $product->category->name }}
                        </div>
                    </div>
                    <div>
                        <div class="text-muted text-uppercase">
                            Stock:
                        </div>
                        <div class="fw-bold">
                            {{ $product->stock }}
                        </div>
                    </div>
                    <div class="">
                        <div class="text-muted text-uppercase">
                            Share:
                        </div>
                        <div class="text-muted d-inline-flex gap-4">
                            <a href="#">
                                <x-lucide-facebook class="tw-h-5 tw-w-5"/>
                            </a>
                            <a href="#">
                                <x-lucide-twitter class="tw-h-5 tw-w-5"/>
                            </a>
                            <a href="#">
                                <x-lucide-instagram class="tw-h-5 tw-w-5"/>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="mt-5">
            <h4>
                Related Products
            </h4>
            <p>
                Below are some of our related products
            </p>
        </div>

        <div class="row">
            @forelse($relatedProducts as $item)
                <div class="col-md-4 col-lg-3">
                    <x-small-card :product="$item"/>
                </div>
            @empty
                <div class="col-12">
                   <div class="alert alert-warning" role="alert">
                       No related products found.
                   </div>
                </div>
            @endforelse
        </div>

    </div>

</div>
