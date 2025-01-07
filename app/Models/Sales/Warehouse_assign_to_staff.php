<?php

namespace App\Models\Sales;

use App\Models\Inventory\Warehouse;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse_assign_to_staff extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    public static function assigned_warehouse($id): int|string
    {
        $staff = User::find($id);

        if (!$staff) {
            return "Staff info not found";
        }

        $warehouse_assigned_state = Warehouse_assign_to_staff::withTrashed()->where('staff_id', $id)->orderBy('id', 'desc')->first();

        if (!$warehouse_assigned_state) {
            return "Warehouse not yet assigned";
        }

        $warehouse = Warehouse::withTrashed()->where('id', $warehouse_assigned_state->warehouse_id)->orderBy('id', 'desc')->first()->name ?? 'Warehouse not found';

        if (!$warehouse) {
            return "Warehouse not found";
        }

        return $warehouse;
    }

    public static function staff_status($id): int|string
    {
        $staff = User::find($id);

        if (!$staff) {
            return "Staff info not found";
        }

        $staff_status = Warehouse_assign_to_staff::withTrashed()->where('staff_id', $id)->orderBy('id', 'desc')->first();

        if (!$staff_status) {
            return "Data not found";
        }

        return ucfirst($staff_status->status) ?? "Data not found";
    }
}
