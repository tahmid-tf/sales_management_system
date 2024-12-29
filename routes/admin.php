<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;


Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {

// -------------------------------- Create Categories --------------------------------

    Route::resource('categories', CategoryController::class);
});
