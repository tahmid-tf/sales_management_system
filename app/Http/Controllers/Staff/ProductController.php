<?php

namespace App\Http\Controllers\Staff;

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
        return view('panel.staff.products.create', compact('products', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $product = Product::find($id);

        if (!$product) {
            return "Product not found";
        }

        $input = $request->validate([
            'stock' => 'required|integer', // Ensuring stock is an integer and non-negative
        ]);

        $product->update($input);
        session()->flash('message', 'Product updated successfully.');
        return redirect()->back();
    }
}
