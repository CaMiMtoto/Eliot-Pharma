<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public Collection $categories;

    public $paginationTheme = 'bootstrap';


    public function mount(): void
    {
        $this->categories = Category::query()
            ->withCount('products')
            ->orderBy('name')
            ->get();
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {

        $products = Product::query()
            ->with('category')
            ->latest()
            ->paginate(10);

        return view('livewire.product-list', [
            'products' => $products
        ])
            ->layout('layouts.app');
    }
}
