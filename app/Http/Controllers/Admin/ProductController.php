<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('panel.admin.products.create', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string', // Assuming SKU should be unique
            'description' => 'required|string',
            'price' => 'required|numeric', // Ensuring price is an integer and non-negative
            'stock' => 'required|integer', // Ensuring stock is an integer and non-negative
            'category_id' => 'required|integer', // Ensuring category_id is valid
        ]);

        if (Category::find($input['category_id']) == null) {
            return "Category not found";
        }

        Product::create($input);
        session()->flash('message', 'Product created successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string', // Assuming SKU should be unique
            'description' => 'required|string',
            'price' => 'required|numeric', // Ensuring price is an integer and non-negative
            'stock' => 'required|integer', // Ensuring stock is an integer and non-negative
            'category_id' => 'required|integer', // Ensuring category_id is valid
        ]);

        if (Category::find($input['category_id']) == null) {
            return "Category not found";
        }

        $product->update($input);
        session()->flash('message', 'Product updated successfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('delete', 'Product deleted successfully.');
        return redirect()->back();
    }

    public function bulkDestroy(Request $request)
    {

        $ids = explode(',', $request->input('ids'));


        try {
            Product::whereIn('id', $ids)->delete();
            return redirect()->back()->with('delete', 'Selected products deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('delete', 'Failed to delete the selected products.');
        }
    }

}
