<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\CodeGeneratorController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\ServiceReviewController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProdctSizeController;


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

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', function() {
    return redirect()->route('home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/checkout', function () {
                return view('checkout');
      })->name('checkout');

    Route::post('/update-password', [App\Http\Controllers\ChangePasswordController::class, 'update_password'])->name('change_update_password');

    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/order/track/{user_id}', [OrderController::class, 'track'])->name('order.track');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.details');
    Route::get('/order-details/{id}', [OrderController::class, 'details'])->name('order.show');
    Route::get('/order/{orderId}/payment-options', [PaymentController::class, 'showPaymentOptions'])->name('pay.options');
	Route::post('/order/{orderId}/pay-now', [PaymentController::class, 'payNow'])->name('order.payNow');
    Route::post('/order/{orderId}/pay-later', [PaymentController::class, 'payLater'])->name('order.payLater');
	Route::get('/order/{orderId}/return', [OrderController::class, 'return'])->name('order.return');
	Route::get('/order/{orderId}/refund', [OrderController::class, 'refund'])->name('order.refund');
	Route::get('/order/{orderId}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');
	Route::get('/order/more-info/{orderId}', [OrderController::class, 'showMore'])->name('orders.showMore');

    Route::get('/account', function () {
    	return view('account');
    })->name('account');

});

Route::get('products/filter', [HomeController::class, 'filterByPrice'])->name('filter.by.price');
Route::get('/products/show/{product}', [App\Http\Controllers\Frontend\FrontendController::class, 'productView'])->name('productshow');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    // Define a new post route for updating stock
    Route::post('update-stock', [App\Http\Controllers\Admin\DashboardController::class, 'updateStock'])->name('admin.update-stock');
    Route::get('/admin', function() {
        return redirect('/admin/dashboard');
    });



	// Product sizes routes
	Route::resource('products', App\Http\Controllers\Admin\ProductController::class); 
    Route::get('products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.create');
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::post('/category/destroy/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin/category/destroy/');
    Route::get('/category/show/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin/category/show');
    Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin/category/edit/');
    Route::get('category',[App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
    Route::match(['put'], '/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin/category/update');
    Route::post('/addimage', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('addimage');
    Route::get('/index', [App\Http\Controllers\Admin\ProductController::class, 'display']);
	Route::get('orders', [App\Http\Controllers\Admin\OrdersController::class, 'index'])->name('admin.orders.index');
    Route::get('orders/edit/{OrderID}', [App\Http\Controllers\Admin\OrdersController::class, 'edit'])->name('admin.orders.edit');
    Route::match(['put'], 'orders/update/{OrderID}', [App\Http\Controllers\Admin\OrdersController::class, 'update'])->name('admin.orders.update');
	Route::get('orders/refund', [App\Http\Controllers\Admin\OrdersController::class, 'refund'])->name('admin.orders.refund');
	Route::get('orders/return/{OrderID}', [App\Http\Controllers\Admin\OrdersController::class, 'returnOrder'])->name('admin.orders.return');
    Route::resource('codes', App\Http\Controllers\Admin\RegistrationCodeController::class)->names('admin.code');
	Route::get('/users', [UsersController::class, 'index'])->name('admin.users.index');
	Route::get('/users/{user}', [UsersController::class, 'show'])->name('admin.users.show');
	Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('admin.users.edit');
	Route::put('/users/{user}', [UsersController::class, 'update'])->name('admin.users.update');

});

Route::get('/search', [App\Http\Controllers\Admin\ProductController::class, 'search']);


// Route to display the About Us page and load reviews
Route::get('/about_us', [App\Http\Controllers\Admin\ServiceReviewController::class, 'index'])->name('about_us');

// Route for submitting reviews
Route::post('/service-reviews', [App\Http\Controllers\Admin\ServiceReviewController::class, 'store'])->name('service-reviews.store');


// Basket routes
Route::get('/basket', [BasketController::class, 'index'])->name('basket');
Route::get('/add-to-basket/{productId}', [BasketController::class, 'addItem'])->name('add-to-basket');
Route::post('/add-to-basket/{productId}', [BasketController::class, 'addItem'])->name('add-to-basket');


Route::get('/contact-us', function () { //URL LINK
    return view('contact_us'); //File Name

})->name('contact_us');

Route::get('/faqs', function () { //URL LINK
    return view('faqs'); //File Name

})->name('faqs');

Route::get('/login', function () { //URL LINK
    return view('login')->name('login'); //File Name

});

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/register', function () { //URL LINK
    return view('register'); //File Name

});

// Forgot password 
// User does not need to be logged in 
// Email must be valid
Route::get('/forgot-password', [App\Http\Controllers\PasswordController::class, 'forgot_password'])->name('forgot_password');

Route::post('/update-password', [App\Http\Controllers\PasswordController::class, 'update_password'])->name('forgot_update_password');

// Change password
// User must be logged in
// Old password must be correct 
Route::get('/change-password', [App\Http\Controllers\ChangePasswordController::class, 'change_password'])->name('change_password');

// Authentication routes
Auth::routes();

Route::get('/remove-item/{itemId}', [BasketController::class, 'removeItem'])->name('remove-item');                                             
Route::post('/basket/updateQuantity/{itemId}', [BasketController::class, 'updateQuantity'])->name('updateQuantity');
Route::get('/basket', [BasketController::class, 'index'])->name('basket');  
Route::delete('/remove-item/{itemId}', [BasketController::class, 'removeItem'])->name('removeItem');
Route::get('/products', [BasketController::class, 'showProducts'])->name('showproducts');;

Route::post('/product/{product_id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');


Route::get('/{any}', function () {
    return view('errors/404');
})->where('any', '.*');