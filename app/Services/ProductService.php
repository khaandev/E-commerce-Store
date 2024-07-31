<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductService{

    public function craeteProduct($request) {
      
        $user = Auth::user();
        $imagesPath = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $imagesPath[] = $path;
            }
        }

        $user->products()->create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'buyprice' => $request->buyprice,
            'category_id' => $request->category_id,
            'images' => json_encode($imagesPath),
        ]);
    }

    public function updateProduct($request, $product){

        $user = Auth::user();
        $updateProduct = Product::findOrFail($product->id);
        $imagesPath = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $imagesPath[] = $path;
            }
        }

        $updateProduct->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => $user->id,
            'discount' => $request->discount,
            'buyprice' => $request->buyprice,
            'category_id' => $request->category_id,
            'images' => json_encode($imagesPath),
        ]);
    }
}