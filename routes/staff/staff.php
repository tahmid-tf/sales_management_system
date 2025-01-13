<?php

use App\Http\Controllers\Staff\ProductController;
use App\Http\Controllers\Staff\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\StaffMiddleware;
use App\Http\Controllers\Staff\Inventory\InventoryController;
use App\Http\Controllers\Staff\Sales\CreateOrderController;

Route::middleware(['auth', StaffMiddleware::class])->prefix('staff')->group(function () {

    // -------------------------------- Manage Products --------------------------------

    Route::get('products', [ProductController::class, 'index'])->name('staff.products.index');
    Route::put('products/{id}', [ProductController::class, 'update'])->name('staff.products.update');

    // -------------------------------- Manage Categories --------------------------------

    Route::get('categories', [CategoryController::class, 'index'])->name('staff.category.index');

    // -------------------------------- Inventory Settings - Inventory --------------------------------

    Route::get('inventory', [InventoryController::class, 'index'])->name('staff.inventory.index');
    Route::put('inventory/{id}', [InventoryController::class, 'update'])->name('staff.inventory.update');

    // -------------------------------- Sales - Create Order --------------------------------

    Route::get('create_order', [CreateOrderController::class, 'index'])->name('staff.create_order.index');
    Route::post('create_order', [CreateOrderController::class, 'store_staff_order'])->name('staff.store_order');

    // -------------------------------- Sales - View Orders --------------------------------

    Route::get('view_orders', [CreateOrderController::class, 'view_orders'])->name('staff.view_order.index');
    Route::get('view_invoice/{id}', [CreateOrderController::class, 'view_invoice'])->name('staff.view_invoice.index');

});
