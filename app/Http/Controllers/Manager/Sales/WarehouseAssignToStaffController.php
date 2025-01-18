<?php

namespace App\Http\Controllers\Manager\Sales;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Warehouse;
use App\Models\Sales\Warehouse_assign_to_staff;
use App\Models\User;
use Illuminate\Http\Request;

class WarehouseAssignToStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = User::where('user_role', 'staff')->get();
        $admins = User::where('user_role', 'admin')->get();
        $warehouses = Warehouse::all();

        return view("panel.manager.Sales.managing_stuffs.create", compact("staffs", "admins", "warehouses"));
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
            'staff_id' => 'required',
            'manager_id' => 'required',
            'warehouse_id' => 'required',
            'admin_id' => 'required',
        ]);

        //  ----------------------------- Checking if staff exists -----------------------------

        $staff = User::where('id', $input['staff_id'])->where('user_role', 'staff')->first();

        if (!$staff) {
            session()->flash("warning", "Staff Id not found");
            return redirect()->back();
        }

        //  ----------------------------- Checking if manager exists -----------------------------

        $manager = User::where('id', $input['manager_id'])->where('user_role', 'manager')->first();

        if (!$manager) {
            session()->flash("warning", "Manager Id not found");
            return redirect()->back();
        }

        //  ----------------------------- Checking if warehouse exists -----------------------------

        $warehouse = Warehouse::find($input['warehouse_id']);

        if (!$warehouse) {
            session()->flash("warning", "Warehouse Id not found");
            return redirect()->back();
        }

        //  ----------------------------- Checking if admin exists -----------------------------

        $manager = User::where('id', $input['admin_id'])->where('user_role', 'admin')->first();

        if (!$manager) {
            session()->flash("warning", "Admin Id not found");
            return redirect()->back();
        }


        //  ----------------------------- If staff ID already exists in operations -----------------------------

        $staff_exists_in_operation = Warehouse_assign_to_staff::where('staff_id', $request->staff_id)->get();

        if ($staff_exists_in_operation) {
            session()->flash("warning", "A warehouse already assigned to this staff or verification is pending from admin side");
            return redirect()->back();
        }


        Warehouse_assign_to_staff::create($input);
        session()->flash("success", "Waiting approval from admin to assign staff!");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
