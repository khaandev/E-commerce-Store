<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = Product::with('category')->simplePaginate(5);
        return view('admin.products.products', compact('products'));
    }

    public function updateSold(Product $product)
    {
        $productSold = Product::findOrFail($product->id);
        $productSold->update(['status' => 'sold']);
        return redirect()->route('products.index')->with('success', 'Product status updated to sold!');


    }
    public function updateAvailable(Product $product)
    {
        $productAvailable = Product::findOrFail($product->id);
        $productAvailable->update(['status' => 'available']);
        return redirect()->route('products.index')->with('success', 'Product status updated to sold!');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.addProduct', compact('categories'));
    }

    public function store(ProductsRequest $request)
    {
        $product = $this->productService->craeteProduct($request);
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function show(Product $product)
    {
        
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        $product = Product::findOrFail($product->id);
        return view('admin.products.updateProduct', compact('product', 'categories'));
    }


    public function update(ProductsRequest $request, Product $product)
    {
        $product = $this->productService->updateProduct($request, $product);
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product = Product::findOrFail($product->id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully !');
    }
}
