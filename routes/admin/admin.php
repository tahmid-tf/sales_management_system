<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Inventory\InventoryController;
use App\Http\Controllers\Admin\Inventory\SupplierController;
use App\Http\Controllers\Admin\Inventory\WareHouseController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserManagement\UserManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\Staff\InitializeStuffController;


Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {

// -------------------------------- Create Categories --------------------------------

    Route::resource('categories', CategoryController::class);

// -------------------------------- Create Products --------------------------------

    Route::resource('products', ProductController::class);
    Route::delete('product/bulk-delete', [ProductController::class, 'bulkDestroy'])->name('products.bulk-delete');

// -------------------------------- Inventory Settings - Warehouse --------------------------------

    Route::resource('warehouses', WarehouseController::class);

// -------------------------------- Inventory Settings - Suppliers --------------------------------

    Route::resource('suppliers', SupplierController::class);

// -------------------------------- Inventory Settings - Inventory --------------------------------

    Route::resource('inventories', InventoryController::class);

// -------------------------------- Staff Management - Staff permission setup --------------------------------

    Route::get("staff_permission", [InitializeStuffController::class, 'index'])->name('staff_permission');
    Route::put("staff_permission/{staff_id}", [InitializeStuffController::class, 'permission_setup'])->name('staff_permission.update');

    // -------------------------------- Sales - View Orders --------------------------------

    Route::get('view_orders', [\App\Http\Controllers\Admin\Sales\SalesController::class, 'view_orders'])->name('admin.view_order.index');
    Route::get('view_invoice/{id}', [\App\Http\Controllers\Admin\Sales\SalesController::class, 'view_invoice'])->name('admin.view_invoice.index');
    Route::get('order_decision/{id}/{decision}', [\App\Http\Controllers\Admin\Sales\SalesController::class, 'order_decision'])->name('admin.order_decision');

    // -------------------------------- Admin - User Management --------------------------------

    Route::resource('user_management', UserManagementController::class);

});

