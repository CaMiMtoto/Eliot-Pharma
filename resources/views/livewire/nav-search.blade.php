<div class="position-relative">
    <form action="{{ route('products') }}" method="get" class="position-relative">
        <input type="search" name="search" wire:model.live.debounce="search"
               class="form-control form-control-lg rounded-pill tw-text-sm bg-light lg:tw-w-96"
               placeholder="Search .." aria-label="Search"/>
 {{--       <x-lucide-search
            class="tw-absolute tw-inset-y-0 tw-top-2  tw-right-2 tw-flex tw-items-center tw-pr-2 tw-text-gray-400 tw-h-6 tw-w-6"/>--}}
    </form>
    @if($search)
        <div
            class="position-absolute tw-top-12 scroll-container left-0 w-100 tw-max-h-[50vh] bg-light tw-z-[11]  border tw-rounded-xl tw-border-gray-200 tw-overflow-auto tw-text-sm tw-text-gray-700 tw-py-1">
            <div class="list-group list-group-flush" wire:loading.remove>
                @foreach($products as $product)
                    <a href="{{ route('products.details', $product->id) }}"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                        <div class="flex-shrink-0">
                            <img src="{{ $product->imageUrl }}"
                                 class="img-fluid tw-h-10 tw-w-10 tw-object-contain tw-rounded-lg "
                                 alt="Product Image"/>
                        </div>
                        <div class="ms-2 me-auto">
                            <div class="">
{{--                                {{ $product->name }}--}}
                                {!! $product->highlightMatchedText($search) !!}
                            </div>
                            <div class="text-muted tw-text-xs  mt-1">
                                <span>
                                    {!! $product->category->highlightMatchedText($search) !!}
                                </span>
                                <x-lucide-dot class="tw-h-4 tw-w-4"/>
                                <span>RWF {{ number_format($product->price) }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div wire:loading.flex class=" tw-justify-center tw-items-center tw-text-gray-400">
                <x-lucide-loader class="tw-w-6 tw-h-6 tw-text-gray-400 tw-mx-auto tw-my-2 tw-animate-spin"/>
            </div>
            @if($products->isEmpty())
                <div  wire:loading.remove>
                    <div class="tw-flex tw-flex-col tw-justify-center mt-4 tw-items-center tw-text-gray-400">
                        <p class="tw-text-center tw-text-sm">No results found for "{{ $search }}"</p>
                    </div>
                </div>
            @endif
        </div>
    @endif


</div>
