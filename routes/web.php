<?php

use App\Http\Controllers\Profile\UserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Staff\Sales\CreateOrderController;

Route::get('/', function () {
    return view('welcome');
});

// ---------------------------- Inventory API ----------------------------

Route::middleware('auth')->group(function () {
    Route::get('inventory_api', [CreateOrderController::class,'staff_inventory_api'])->name('inventory_api');
});

// ----------------------------------------------- panel route redirects -----------------------------------------------

Route::get('/dashboard', [PermissionController::class, 'permission'])->middleware(['auth'])->name('dashboard');
Route::get('/logout', [PermissionController::class, 'logout'])->name('log_out')->middleware(['auth']);

// ----------------------------------------------- panel route redirects -----------------------------------------------

// ----------------------------------------------- profile routes ------------------------------------------------------

Route::middleware(['auth'])->group(function () {
    Route::get('user_profile', [UserProfileController::class, 'index'])->name('view_profile');
    Route::post('user_profile', [UserProfileController::class, 'store'])->name('store_profile');
    Route::put('user_profile/update', [UserProfileController::class, 'update'])->name('update_profile');
});

// ----------------------------------------------- profile routes ------------------------------------------------------


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

// --------------------------------- Admin Routes -----------------------------------
require __DIR__ . '/admin/admin.php';
// --------------------------------- Manager Routes ---------------------------------
require __DIR__ . '/manager/manager.php';
// --------------------------------- Manager Routes ---------------------------------
require __DIR__ . '/staff/staff.php';
