<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Inventory;
use App\Models\Inventory\Warehouse;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::all();
        $warehouses = Warehouse::all();
        $inventories = Inventory::all();

        return view('panel.admin.inventory.inventory.create', compact('products', 'warehouses', 'inventories'));

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
            'product_id' => 'required',
            'warehouse_id' => 'required',
            'quantity' => 'required',
        ]);

        $product = Product::find($input['product_id']);

        if (!$product) {
            return "Product not found";
        }

        $warehouse = Warehouse::find($input['warehouse_id']);

        if (!$warehouse) {
            return "Warehouse not found";
        }
        
        Inventory::create($input);
        session()->flash('success', 'Inventory created successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        // Find the inventory record
        $inventory = Inventory::find($id);

        if (!$inventory) {
            return redirect()->back()->withErrors(['error' => 'Inventory record not found.']);
        }

        // Validate the input
        $input = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'warehouse_id' => 'required|integer|exists:warehouses,id',
            'quantity' => 'required|numeric|min:1',
        ]);


        // Update the inventory record
        $inventory->update($input);

        session()->flash('update', 'Inventory updated successfully.');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
