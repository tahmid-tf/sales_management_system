<?php

namespace App\Exports;

use App\Models\Inventory\Warehouse;
use App\Models\OrderData;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderDataExport implements FromCollection, withHeadings, ShouldAutoSize
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return OrderData::all()->map(function ($order) {
            // Safely decode JSON for items and item_ids
            $items = collect(json_decode($order->items) ?? []); // Default to empty collection if null
            $itemIds = json_decode($order->items_ids) ?? []; // Default to empty array if null

            return [
                'ID' => $order->id,
                'Name' => $order->name,
                'Email' => $order->email,
                'Phone' => $order->phone,
                'Address' => $order->address,
                'Items' => $items->map(function ($item) {
                    return "Name: {$item->name}, sku: {$item->sku}, price: {$item->price}";
                })->join('; '),
                'Item Products' => Product::withTrashed()
                    ->whereIn('id', $itemIds)
                    ->pluck('name')
                    ->join(', '),
                'Total Amount' => $order->total_amount,
                'Order Date' => $order->order_date,
                'Status' => $order->status,
                'WareHouse Name' => optional(Warehouse::withTrashed()->find($order->warehouse_id))->name,
                'Manager Name' => optional(User::withTrashed()->find($order->manager_id))->name,
                'Staff Name' => optional(User::withTrashed()->find($order->staff_id))->name,
                'Created At' => $order->created_at,
                'Updated At' => $order->updated_at,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID', 'Name', 'Email', 'Phone', 'Address', 'Product Description', 'Products Items', 'Total Amount', 'Order Date', 'Order Status', 'WareHouse Name', 'Manager Name', 'Staff Name', 'Created At', 'Updated At'
        ];
    }
}
