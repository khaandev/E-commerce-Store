<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sold_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoldProductController extends Controller
{
    public function sellProduct(Product $product)
    {
        $user = Auth::user();
        $cost = $product->buyprice;
        $sellingPrice = $product->price;

        if ($product->discount > 0) {
            $sellingPrice = $product->price - ($product->price * ($product->discount / 100));
        }

        $profit = $sellingPrice - $cost;

        // Create sold product record
        Sold_Product::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'cost' => $cost,
            'profit' => $profit,
        ]);

        $product->update(['status' => 'order pending']);
        return back()->with('success', 'Product Add successfully  order pending!');


    }
}
