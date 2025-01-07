<?php

namespace App\Http\Controllers\Admin\Staff;

use App\Http\Controllers\Controller;
use App\Models\Sales\Warehouse_assign_to_staff;
use Illuminate\Http\Request;

class InitializeStuffController extends Controller
{
    public function index()
    {
        $warehouse_assign_to_staffs = Warehouse_assign_to_staff::all();
        return view('panel.admin.sales.staff_permission.staff_permission', compact('warehouse_assign_to_staffs'));
    }

    public function permission_setup(Request $request, string $staff_id)
    {
        $warehouse_assign_to_staffs = Warehouse_assign_to_staff::where('staff_id', $staff_id)->first();

        if ($warehouse_assign_to_staffs->status == 'inactive') {
            $warehouse_assign_to_staffs->status = 'active';
            $warehouse_assign_to_staffs->save();
        } else {
            $warehouse_assign_to_staffs->status = 'inactive';
            $warehouse_assign_to_staffs->save();
        }

        session()->flash("Permission for this Staff is set successfully");
        return back();
    }
}
