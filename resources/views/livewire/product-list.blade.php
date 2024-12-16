<div>
    {{-- Be like water. --}}
    <div class="bg-light py-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
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
                                <div class="fw-bold">{{ $category->name }}</div>
                            </div>
                            <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill">
                                {{ $category->products_count }}
                            </span>
                        </li>
                    @endforeach

                </ol>

            </div>

            <div class="col-lg-8">
                <div class="tw-min-h-20">
                    <h5>
                        Product List
                    </h5>
                    <p class="tw-text-sm">
                        Below are the products available in the store. You can filter the products by category.
                    </p>
                </div>
                <div class="row">

                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 my-2 col-12">
                            <x-small-card :product="$product"></x-small-card>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</div>
