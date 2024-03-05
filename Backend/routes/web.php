<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\OrderController;



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


Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Sending admins to the dashboard if they input the wrong URL
Route::get('/admin', function() {
    return redirect('/admin/dashboard');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Authenticated routes for admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    
    
   
 // Product routes
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class); 
    Route::get('products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.create');

    
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



// Basket routes
Route::get('/basket', [BasketController::class, 'index'])->name('basket');
Route::get('/add-to-basket/{productId}', [BasketController::class, 'addItem'])->name('add-to-basket');
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

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/register', function () { //URL LINK
    return view('register'); //File Name

});

// Other static page routes...
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/forgot-password', function () { //URL LINK
    return view('forgot_password'); //File Name
});

// Other static page routes...
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

// Other routes...

// Authentication routes
Auth::routes();

// basket route
Route::get('/remove-item/{itemId}', [BasketController::class, 'removeItem'])->name('remove-item');
Route::get('/basket', [BasketController::class, 'index'])->name('basket');
Route::delete('/remove-item/{itemId}', [BasketController::class, 'removeItem'])->name('removeItem');
Route::get('/products', [BasketController::class, 'showProducts'])->name('showproducts');;

// order status route
Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});
// Route to display the list of orders (order.blade.php)
//Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');

// Route to display a specific order's details (show.blade.php)
//Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('orders.index');
    Route::get('/orders/{order}', 'App\Http\Controllers\OrderController@show')->name('orders.show');
});



// Route any unknown webpage to display the 404 error
Route::get('/{any}', function () {
    return view('/errors/404');
})->where('any', '.*');