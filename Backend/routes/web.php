<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider, and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Correcting the route group
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    // You can define more routes specific to the 'dashboard' prefix here
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    
    Route::get('products/create',[App\Http\Controllers\Admin\ProductController::class, 'create']); 
    // Using resource route for product
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    // Explicitly define the create route
    Route::get('products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('products.create');

    //created routes for category controller
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);


});
