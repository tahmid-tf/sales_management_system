<?php

namespace App\Http\Controllers\Admin\Sales;

use App\Http\Controllers\Controller;
use App\Models\OrderData;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function view_orders()
    {
        $orders = OrderData::select('id', 'name', 'email', 'phone', 'status')->get();
        return view('panel.every_state.sales.view_orders', compact('orders'));
    }


    public function view_invoice($id)
    {
        $order_data = OrderData::find($id);
        return view('panel.every_state.sales.view_invoice', compact('order_data'));
    }

    public function order_decision($id)
    {

    }
}
