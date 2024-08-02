<?php

namespace App\Models;

use App\Traits\BelongsToProduct;
use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sold_Product extends Model
{
    use HasFactory,BelongsToUser,BelongsToProduct;

    protected $guarded = [];

   
}
