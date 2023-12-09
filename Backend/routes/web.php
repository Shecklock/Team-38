<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\CategoryFormRequest;


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
    return view('home');
});

Auth::routes();

// Sending admins to the dashboard if they input the wrong url
Route::get('/admin', function() {
    return redirect('/admin/dashboard');
});

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
    Route::post('/category/destroy/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin/category/destroy/');
    Route::get('/category/show/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin\category\show');
    Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin\category\edit');
    Route::get('admin/category/index',[App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin/category/index');
    Route::match(['put'], '/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin/category/update');
    
    


    Route::post('/addimage', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('addimage');
    Route::get('/index', [App\Http\Controllers\Admin\ProductController::class, 'display']);
   
    
});

Route::get('/search', [App\Http\Controllers\Admin\ProductController::class, 'search']);

Route::get('/about-us', function () {
    return view('about_us');
    
    
})->name('about_us');


use App\Http\Controllers\HomeController;

Route::get('/basket', function () { //URL LINK
    return view('basket'); //File Name

});

Route::get('/checkout', function () { //URL LINK
    return view('checkout'); //File Name

});

Route::get('/contact-us', function () { //URL LINK
    return view('contact_us'); //File Name

});

Route::get('/faqs', function () { //URL LINK
    return view('faqs'); //File Name

});

Route::get('/forgot-password', function () { //URL LINK
    return view('forgot_password'); //File Name

});

Route::get('/login', function () { //URL LINK
    return view('login'); //File Name

});

Route::get('/register', function () { //URL LINK
    return view('register'); //File Name

});

// Route any unknown webpage to display the 404 error
Route::get('/{any}', function() {
    return view('/errors/404');
})->where('any', '.*');


// Other routes...

// Authentication routes
Auth::routes();

// Your other routes...


Route::get('/', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\BasketController;

Route::get('/basket', [BasketController::class, 'index'])->name('basket');




