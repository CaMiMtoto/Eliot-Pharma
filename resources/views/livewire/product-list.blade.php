<div>
    {{-- Be like water. --}}
    <div class="bg-light py-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="tw-min-h-20">
                    <h5>
                        Product Categories
                    </h5>
                    <p class="tw-text-sm">
                        Below are the categories of products available in the store.
                    </p>
                </div>

                <ol class="list-group my-2 list-group-numbered">
                    @foreach($categories as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <a href="javascript:void(0);"
                                   wire:click.prevent="updateSelectedCategory({{ $category->id }})"
                                   class="fw-bold">{{ $category->name }}</a>
                            </div>
                            <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill">
                                {{ $category->products_count }}
                            </span>
                        </li>
                    @endforeach

                </ol>

            </div>

            <div class="col-lg-8">
                <div class="tw-min-h-20 d-flex  justify-content-between align-items-center">
                    <div>
                        <input type="search" wire:model.live.debounce="search" placeholder="Search..."
                               class="form-control tw-text-xs py-2 lg:tw-w-96"/>
                    </div>
                    <div>
                        <button class="btn btn-light border tw-text-xs py-2" wire:click="resetData()">
                            <i class="bi bi-arrow-clockwise"></i>
                            Reset Filters
                        </button>
                    </div>
                </div>

                <div class="justify-content-center mb-4 gap-2 align-items-center" wire:loading.flex>
                    <x-lucide-loader class="tw-animate-spin tw-h-5 tw-w-5 tw-text-gray-900"></x-lucide-loader>
                    <p class="tw-text-sm mb-0">
                        Loading...
                    </p>
                </div>
                <div class="row" wire:loading.class="opacity-50">
                    @foreach($products as $product)
                        <div class="col-xl-4 col-md-6 my-2 col-12">
                            <x-small-card :product="$product"></x-small-card>
                        </div>
                    @endforeach
                    <div class="col-12">
                        {{ $products->links() }}
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
