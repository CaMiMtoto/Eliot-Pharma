<?php

namespace App\Models;

use App\Traits\HighlightName;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;
    protected $appends = ['image_url', 'real_price'];
    use HighlightName;

    const IMAGE_PATH = 'products/';

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */

    #[SearchUsingPrefix(['id', 'price'])]
    #[SearchUsingFullText(['name'])]
    public function toSearchableArray(): array
    {

        return [
            'id' => (int) $this->id,
            'name' => $this->name,
            'price' => (float) $this->price,
        ];
    }

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
