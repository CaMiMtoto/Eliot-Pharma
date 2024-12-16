<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $paginationTheme = 'bootstrap';
    public $selectedCategory;
    #[Url]
    public $search='';





    public function mount(): void
    {

    }

    public function resetData(): void
    {
        $this->resetPage();
        $this->selectedCategory = null;
    }
    public function updateSelectedCategory($categoryId): void
    {
        $this->resetPage();

        $this->selectedCategory = $categoryId;
    }



    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {

        $products = Product::query()
            ->with('category')
            ->when($this->selectedCategory, function ($query) {
                return $query->where('category_id', $this->selectedCategory);
            })
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(12);
        $categories = Category::query()
            ->withCount('products')
            ->orderBy('name')
            ->get();
        return view('livewire.product-list', [
            'products' => $products,
            'categories' => $categories
        ])
            ->layout('layouts.app');
    }
}
