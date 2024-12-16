<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SmallCard extends Component
{
    public Product $product;
    public bool $showDescription=false;
    public bool $isNew=false;
    public function __construct(Product $product,bool $showDescription=false,bool $isNew=false)
    {
        $this->product = $product;
        $this->showDescription = $showDescription;
        $this->isNew = $isNew;
    }
    public function render(): View
    {
        return view('components.small-card');
    }
}
