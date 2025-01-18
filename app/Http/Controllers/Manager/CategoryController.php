<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('panel.manager.categories.create', compact('categories'));
    }

    public function update(Request $request)
    {

        $input = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = Category::find($input['id']);

        if (!$category) {
            return "Category not found";
        }

        $category->where('id', $input['id'])->update(['name' => $input['name'], 'description' => $input['description']]);
        session()->flash('update', 'Category updated successfully.');
        return redirect()->back();
    }

}
