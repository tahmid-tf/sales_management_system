<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('panel.manager.products.create', compact('products', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $product = Product::find($id);

        if (!$product) {
            return "Product not found";
        }

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
}
