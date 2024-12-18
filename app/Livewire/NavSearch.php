<?php

namespace App\Livewire;

use Livewire\Component;

class NavSearch extends Component
{
    public $search = '';

    public $queryString = ['search'];

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $products = \App\Models\Product::Query()
            ->with('category')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('category', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    });
            })
            ->limit(10)
            ->get();

        return view('livewire.nav-search', [
            'products' => $products
        ]);
    }


}
