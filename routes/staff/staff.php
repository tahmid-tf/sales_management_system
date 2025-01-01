<?php

use App\Http\Controllers\Staff\ProductController;
use App\Http\Controllers\Staff\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\StaffMiddleware;

Route::middleware(['auth', StaffMiddleware::class])->prefix('staff')->group(function () {

    // -------------------------------- Manage Products --------------------------------

    Route::get('products', [ProductController::class, 'index'])->name('staff.products.index');
    Route::put('products/{id}', [ProductController::class, 'update'])->name('staff.products.update');

    // -------------------------------- Manage Categories --------------------------------

    Route::get('categories', [CategoryController::class, 'index'])->name('staff.category.index');

});
