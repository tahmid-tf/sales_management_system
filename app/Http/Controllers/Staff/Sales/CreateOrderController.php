<?php

namespace App\Http\Controllers\Staff\Sales;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Inventory;
use App\Models\OrderData;
use App\Models\Sales\Warehouse_assign_to_staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CreateOrderController extends Controller
{
    public function index()
    {
        $managers = User::where('user_role', 'manager')->get();
        return view('panel.staff.sales.order.create_order', compact('managers'));
    }

    public function view_orders()
    {
        $orders = OrderData::select('id', 'name', 'email', 'phone', 'status', 'order_date')->where('staff_id', auth()->id())->get();
        return view('panel.every_state.sales.view_orders', compact('orders'));
    }


    public function view_invoice($id)
    {
        $order_data = OrderData::find($id);
        return view('panel.every_state.sales.view_invoice', compact('order_data'));
    }

    public function staff_inventory_api()
    {
        $warehouse_id = Warehouse_assign_to_staff::where('staff_id', auth()->id())->first()->warehouse_id;

        if (!$warehouse_id) {
            return response()->json([
                'success' => false,
            ], Response::HTTP_FORBIDDEN);
        }


        $products = DB::table('products')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->select(
                'products.id as product_id',
                'products.name',
                'products.sku',
                'products.price',
                'inventories.id as inventory_id',
                'inventories.quantity'
            )->where('inventories.deleted_at', '=', null)
            ->where('inventories.warehouse_id', '=', $warehouse_id)
            ->get();

        return response()->json([
            'data' => $products
        ], 200);
    }

    public function store_staff_order(Request $request)
    {


        $warehouse_id = Warehouse_assign_to_staff::where('staff_id', auth()->id())->first()->warehouse_id;

        if (!$warehouse_id) {
            session()->flash('warning', 'Warehouse not yet assigned to staff');
            return redirect()->back();
        }

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'order_date' => 'nullable|date',
            'items' => 'required|json',
            'items_ids' => 'required|json',
            'manager_id' => 'required|integer',
        ]);


        $user = User::find((int)$validated['manager_id']);

        if (!$user || $user->user_role != 'manager') {
            session()->flash('warning', 'Manager data does not exist or the user is not a manager');
            return redirect()->back();
        }

        $order = new OrderData();
        $order->name = $validated['name'];
        $order->email = $validated['email'];
        $order->phone = $validated['phone'];
        $order->address = $validated['address'];
        $order->order_date = $validated['order_date'];
        $order->items = $validated['items'];
        $order->items_ids = $validated['items_ids'];
        $order->warehouse_id = $warehouse_id;
        $order->manager_id = (int)$validated['manager_id'];
        $order->staff_id = auth()->id();
        $order->total_amount = array_reduce(json_decode($validated['items'], true), function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

// --------------------- saving order

        $order->save();
        session()->flash('success', 'Order created successfully and waiting for managers confirmation');
        return redirect()->back();
    }
}
