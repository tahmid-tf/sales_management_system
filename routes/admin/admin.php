<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Inventory\InventoryController;
use App\Http\Controllers\Admin\Inventory\SupplierController;
use App\Http\Controllers\Admin\Inventory\WareHouseController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;


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


});

