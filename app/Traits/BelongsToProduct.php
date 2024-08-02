<?php
namespace App\Traits;
use App\Models\Product;


trait BelongsToProduct
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}


