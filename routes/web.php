<?php

use App\Http\Controllers\Profile\UserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ---------------------------- Test route ----------------------------

Route::get('category_page', function (){
//    return view('panel.admin.categories.create');
});

// ----------------------------------------------- panel route redirects -----------------------------------------------

Route::get('/dashboard', function () {

//    ------------------- admin dashboard -------------------

    if (auth()->user()->user_role == 'admin') {
        return view('panel.admin.dashboard');
    } else {
        abort(404);
    }

})->middleware(['auth', 'verified'])->name('dashboard');

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

// --------------------------------- Admin Routes ---------------------------------
require __DIR__ . '/admin.php';
