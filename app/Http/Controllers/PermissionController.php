<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory\Inventory;
use App\Models\Inventory\Supplier;
use App\Models\Inventory\Warehouse;
use App\Models\OrderData;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

//    ------------------- admin dashboard -------------------

    public function permission()
    {
        if (auth()->user()->user_role == 'admin') {
            return redirect(route('admin.dashboard'));
        } elseif (auth()->user()->user_role == 'manager') {
            return redirect(route('manager.dashboard'));
        } elseif (auth()->user()->user_role == 'staff') {
            return redirect(route('staff.dashboard'));
        } else {
            abort(404);
        }
    }


    public function admin_dashboard()
    {

        $categories_count = Category::count();
        $products_count = Product::count();
        $suppliers_count = Supplier::count();
        $warehouses_count = Warehouse::count();
        $inventory_count = Inventory::count();
        $users_count = User::count();

        $users = User::all();

        $order_count = OrderData::count();
        $pending_order_count = OrderData::where('status', 'pending')->count();
        $accepted_order_count = OrderData::where('status', 'accepted')->count();
        $rejected_order_count = OrderData::where('status', 'rejected')->count();

        $total_sold = OrderData::where('status', 'accepted')->sum('total_amount');

        return view('panel.admin.dashboard', compact('categories_count', 'products_count', 'suppliers_count', 'warehouses_count', 'inventory_count', 'users_count',
            'order_count', 'pending_order_count', 'accepted_order_count', 'rejected_order_count', 'total_sold', 'users'));
    }

    public function manager_dashboard()
    {

        $categories_count = Category::count();
        $products_count = Product::count();
        $suppliers_count = Supplier::count();
        $warehouses_count = Warehouse::count();
        $inventory_count = Inventory::count();
        $users_count = User::count();

        $users = User::all();

        $order_count = OrderData::count();
        $pending_order_count = OrderData::where('status', 'pending')->count();
        $accepted_order_count = OrderData::where('status', 'accepted')->count();
        $rejected_order_count = OrderData::where('status', 'rejected')->count();

        $total_sold = OrderData::where('status', 'accepted')->sum('total_amount');

        return view('panel.manager.dashboard', compact('categories_count', 'products_count', 'suppliers_count', 'warehouses_count', 'inventory_count', 'users_count',
            'order_count', 'pending_order_count', 'accepted_order_count', 'rejected_order_count', 'total_sold', 'users'));
    }

    public function staff_dashboard()
    {

        $categories_count = Category::count();
        $products_count = Product::count();
        $suppliers_count = Supplier::count();
        $warehouses_count = Warehouse::count();
        $inventory_count = Inventory::count();


        $order_count = OrderData::where('staff_id', auth()->id())->count();
        $pending_order_count = OrderData::where('status', 'pending')->where('staff_id', auth()->id())->count();
        $accepted_order_count = OrderData::where('status', 'accepted')->where('staff_id', auth()->id())->count();
        $rejected_order_count = OrderData::where('status', 'rejected')->where('staff_id', auth()->id())->count();

        $total_sold = OrderData::where('status', 'accepted')->where('staff_id', auth()->id())->sum('total_amount');


        return view('panel.staff.dashboard', compact('categories_count', 'products_count', 'suppliers_count', 'warehouses_count', 'inventory_count',
            'order_count', 'pending_order_count', 'accepted_order_count', 'rejected_order_count', 'total_sold'));
    }


    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
