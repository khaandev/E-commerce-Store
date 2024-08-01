<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Product $product) {

        $user = Auth::user();
        $user->likedProducts()->attach($product->id);
        return back()->with('success', 'Product liked!');

    }

    public function unlike(Product $product)
    {
        $user = Auth::user();
        $user->likedProducts()->detach($product->id);
        return back()->with('success', 'Product unliked!');
    }
}
