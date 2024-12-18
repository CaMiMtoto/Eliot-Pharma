<?php

namespace App\Models;

use App\Traits\HighlightName;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HighlightName;

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }
}
