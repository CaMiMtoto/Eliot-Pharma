<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = ['image_url', 'real_price'];

    const IMAGE_PATH = 'products/';

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute(): string
    {
        return \Storage::url(self::IMAGE_PATH . $this->image);
    }

    public function getRealPriceAttribute()
    {
        if ($this->discount_percentage > 0) {
            return ceil($this->price - ($this->price * $this->discount_percentage / 100));
        }
        return $this->price;
    }
}
