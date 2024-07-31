<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::simplePaginate(5);

        return view('admin.categories.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:categories,name'],
        ]);

        // Create a new category with the validated data
         Category::create([
            'name' => $validatedData['name'],
        ]);

        // Optional: Redirect or return a response
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        $category = Category::findOrFail($category->id);

        return view('admin.categories.updateCategory',compact('category'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:categories,name,' . $category->id],
        ]);

        // Update the category with the validated data
        $category->update([
            'name' => $validatedData['name'],
        ]);

        // Optional: Redirect or return a response
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = Category::findOrfail($category->id);
          $category -> delete();
          return redirect()->route('categories.index')->with('success', 'Category delete successfully.');

    }
}
