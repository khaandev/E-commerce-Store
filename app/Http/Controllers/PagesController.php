<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function products() {
      $products = Product::where('status','=' , 'available')->with('category')->simplePaginate(10);
        $totalProductsCount = Product::where('status', 'available')->count();

      return view('pages.shop',compact(['products', 'totalProductsCount']));


    }

    public function productsShow($id){

      $product = Product::findOrFail($id);


        return view('pages.products.showProducts', compact('product'));
      



    }

}
