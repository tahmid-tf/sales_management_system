<?php

use App\Http\Controllers\Manager\CategoryController;
use App\Http\Controllers\Manager\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ManagerMiddleware;
use App\Http\Controllers\Manager\Inventory\InventoryController;

Route::middleware(['auth', ManagerMiddleware::class])->prefix('manager')->group(function () {

    // -------------------------------- Manage Categories --------------------------------

    Route::get('categories', [CategoryController::class, 'index'])->name('manager.category.index');
    Route::put('categories/{id}', [CategoryController::class, 'update'])->name('manager.category.update');

    // -------------------------------- Manage Products --------------------------------

    Route::get('products', [ProductController::class, 'index'])->name('manager.products.index');
    Route::put('products/{id}', [ProductController::class, 'update'])->name('manager.products.update');

    // -------------------------------- Inventory Settings - Inventory --------------------------------

    Route::get('inventory', [InventoryController::class, 'index'])->name('manager.inventory.index');
    Route::put('inventory/{id}', [InventoryController::class, 'update'])->name('manager.inventory.update');

});
