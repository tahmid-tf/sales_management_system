<?php

use App\Http\Controllers\Manager\CategoryController;
use App\Http\Controllers\Manager\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ManagerMiddleware;

Route::middleware(['auth', ManagerMiddleware::class])->prefix('manager')->group(function () {

    // -------------------------------- Manage Categories --------------------------------

    Route::get('categories', [CategoryController::class, 'index'])->name('manager.category.index');
    Route::put('categories/{id}', [CategoryController::class, 'update'])->name('manager.category.update');


    // -------------------------------- Manage Products --------------------------------

    Route::get('products', [ProductController::class, 'index'])->name('manager.products.index');
    Route::put('products/{id}', [ProductController::class, 'update'])->name('manager.products.update');


});
