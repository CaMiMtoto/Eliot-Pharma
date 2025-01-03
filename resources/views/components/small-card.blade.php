<div {{ $attributes->class(['card position-relative tw-border-slate-100 hover:tw-border-slate-200 h-100 hover:tw-border-dashed tw-border-2  tw-rounded-sm tw-z-2']) }}>
    <img
        src="{{asset('assets/media/misc/loader-circle.svg')}}"
        data-src="{{ $product->imageUrl }}"
        class="card-img-top lozad img-fluid tw-h-52 tw-object-contain" alt="..."/>
    @if($isNew)
        <div
            class="position-absolute top-0 start-0  text-primary text-uppercase tw-text-xs tw-font-bold tw-px-2 tw-py-1">
            New
        </div>
    @endif
    {{--                        discount--}}
    @if($product->discount_percentage >0)
        <div
            class="position-absolute tw-top-2 tw-right-2 tw-h-10 tw-w-10  d-inline-flex align-items-center justify-content-center text-primary bg-primary-subtle rounded-circle text-uppercase tw-text-xs tw-font-bold tw-px-2 tw-py-1">
            -{{$product->discount_percentage}}%
        </div>
    @endif


    <div class="card-body">
        <h5 class="tw-text-sm text-center fw-semibold tw-leading-relaxed">
            {{ \Illuminate\Support\Str::of($product->name)->limit(30) }}
        </h5>
        @if($showDescription)
            <p class="text-center text-muted tw-text-sm">
                {{ $product->description }}
            </p>
        @endif
        <div
            class="text-center mb-3 d-inline-flex align-items-center justify-content-center gap-2 text-primary  tw-rounded-lg text-uppercase px-4 w-100">
            @if($product->discount_percentage>0)
                <del aria-hidden="true">
                <span class="woocommerce-Price-amount amount">
                    <bdi>  {{number_format($product->price)}}</bdi>
                </span>
                </del>
            @endif
            <span class="screen-reader-text">
                {{number_format($product->real_price)}}
            </span>
        </div>
        <div class="text-center">
            <a href="{{ route('products.details',$product->id) }}"
               class="btn btn-outline-primary d-inline-flex align-items-center justify-content-center gap-2 tw-tracking-wide fw-semibold text-primary-emphasis  tw-rounded-sm text-uppercase hover:tw-text-white">
{{--                <x-lucide-eye class="tw-w-5 tw-h-5"/>--}}
                View Details
            </a>
        </div>
    </div>
</div>
