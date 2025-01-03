<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Warehouse;
use Illuminate\Http\Request;

class WareHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('panel.admin.inventory.warehouse.create', compact('warehouses'));
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
        $input = request()->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        WareHouse::create($input);
        session()->flash('message', 'Warehouse has been created.');
        return back();

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

        $input = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'location' => 'required',
        ]);

        $warehouse = Warehouse::find($input['id']);

        if (!$warehouse) {
            return "Warehouse not found";
        }

        $warehouse->update($input);
        session()->flash('update', 'Warehouse has been updated.');
        return back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {

        $warehouse = Warehouse::find($id);

        if (!$warehouse) {
            return "Warehouse not found";
        }

        $warehouse->delete();
        session()->flash('delete', 'Warehouse has been deleted.');
        return back();

    }
}
