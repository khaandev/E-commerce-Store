<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory ,BelongsToUser;

    protected $guarded = [];

  

    public function getDiscountedPriceAttribute()
    {
        if ($this->discount > 0) {
            return $this->price - ($this->price * ($this->discount / 100));
        }
        return $this->price;
    }
  



    protected $casts = [
        'images' => 'array'
    ];

    public function soldRecords()
    {
        return $this->hasMany(Sold_Product::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }
}
