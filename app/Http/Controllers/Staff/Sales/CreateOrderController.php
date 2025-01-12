<?php

namespace App\Http\Controllers\Staff\Sales;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateOrderController extends Controller
{
    public function index()
    {
        $managers = User::where('user_role', 'manager')->get();
        return view('panel.staff.sales.order.create_order', compact('managers'));
    }

    public function staff_inventory_api()
    {

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
            ->get();

        return response()->json([
            'data' => $products
        ], 200);
    }

    public function store_staff_order(Request $request){
        return $request->all();
    }
}
