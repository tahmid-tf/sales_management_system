<?php

namespace App\Http\Controllers\Staff\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Inventory;
use App\Models\Inventory\Warehouse;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {

        $products = Product::all();
        $warehouses = Warehouse::all();
        $inventories = Inventory::all();

        return view('panel.staff.inventory.inventory.create', compact('products', 'warehouses', 'inventories'));
    }

    public function update(Request $request, string $id)
    {

        // Find the inventory record
        $inventory = Inventory::find($id);

        if (!$inventory) {
            return redirect()->back()->withErrors(['error' => 'Inventory record not found.']);
        }

        // Validate the input
        $input = $request->validate([
            'quantity' => 'required|integer',
        ]);

        // Update the inventory record
        $inventory->update($input);

        session()->flash('update', 'Inventory updated successfully.');
        return redirect()->back();
    }
}
