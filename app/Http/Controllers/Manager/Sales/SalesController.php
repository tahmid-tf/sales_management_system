<?php

namespace App\Http\Controllers\Manager\Sales;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Inventory;
use App\Models\OrderData;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function view_orders()
    {
        $orders = OrderData::select('id', 'name', 'email', 'phone','order_date','status')->where('manager_id', auth()->id())->get();
        return view('panel.every_state.sales.view_orders', compact('orders'));
    }


    public function view_invoice($id)
    {
        $order_data = OrderData::find($id);
        return view('panel.every_state.sales.view_invoice', compact('order_data'));
    }

    public function order_decision($id, $decision)
    {
        $order = OrderData::find($id);

        if (!$order) {
            session()->flash('warning', 'Order data not found');
            return redirect()->back();
        }

        if ($order->status == 'pending') {
            if ($decision == 'accept') {

                $items = json_decode($order->items);
                foreach ($items as $item) {
                    $inventory_update = Inventory::withTrashed()->where('warehouse_id', $order->warehouse_id)->where('product_id', $item->product_id)->first();
                    $inventory_update->quantity = $inventory_update->quantity - $item->quantity;
                    $inventory_update->save();
                }

                $order->status = 'accepted';
                $order->save();
                session()->flash('success', 'Order Confirmed Successfully');
                return redirect()->route('manager.view_order.index');
            } elseif ($decision == 'reject') {
                $order->status = 'rejected';
                $order->save();
                session()->flash('success', 'Order Declined Successfully');
                return redirect()->route('manager.view_order.index');

            }
        }else {
            session()->flash('success', 'Order confirmed earlier');
            return redirect()->route('manager.view_order.index');
        }
        return null;
    }
}
