<?php
//admin routes
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::middleware('auth:admin')->group(function () {

        //dashobard
        Route::get('/', '\App\Http\Controllers\DashboardController@index');

        //products
        Route::resource('/products', '\App\Http\Controllers\ProductController');

        //orders
        Route::resource('/orders', '\App\Http\Controllers\OrderController');
        Route::get('/confirm/{id}', '\App\Http\Controllers\OrderController@confirm')->name('order.confirm');
        Route::get('/pending/{id}', '\App\Http\Controllers\OrderController@pending')->name('order.pending');

        //users
        Route::resource('/users', '\App\Http\Controllers\UsersController');

        //logout
        Route::get('/logout', '\App\Http\Controllers\AdminUserController@logout');
    });

    //admin login
    Route::get('/login', '\App\Http\Controllers\AdminUserController@index')->name('login');
    Route::post('/login', '\App\Http\Controllers\AdminUserController@store');
});

Route::get('/', '\App\Http\Controllers\Front\HomeController@index')->name('cart.index');

//User Registration
Route::get('/user/register','\App\Http\Controllers\Front\RegistrationController@index');
Route::post('/user/register','\App\Http\Controllers\Front\RegistrationController@store');

//user login

Route::get('/user/login', '\App\Http\Controllers\Front\SessionsController@index');
Route::post('/user/login', '\App\Http\Controllers\Front\SessionsController@store');
Route::get('/user/logout', '\App\Http\Controllers\Front\SessionsController@logout');

//user profile and change password
Route::get('/user/profile', '\App\Http\Controllers\Front\UserProfileController@index')->name('user.profile');
Route::get('/user/order/{id}', '\App\Http\Controllers\Front\UserProfileController@show');

Route::get('/user/changepassword', '\App\Http\Controllers\Front\ChangePasswordController@index')->name('change.password');
Route::post('/user/changepassword', '\App\Http\Controllers\Front\ChangePasswordController@store');
Route::get('/user/edit/user', '\App\Http\Controllers\Front\EditUserController@index')->name('user.update');
Route::post('/user/edit/user', '\App\Http\Controllers\Front\EditUserController@update');


//cart
Route::get('/cart', '\App\Http\Controllers\Front\CartController@index');
Route::post('/cart', '\App\Http\Controllers\Front\CartController@store')->name('cart');
Route::patch('/cart/update/{product}','\App\Http\Controllers\Front\CartController@update')->name('cart.update');
Route::delete('/cart/remove/{product}','\App\Http\Controllers\Front\CartController@destroy')->name('cart.destroy');
Route::post('/cart/savelater/{product}','\App\Http\Controllers\Front\CartController@savelater')->name('cart.save');

//save for later remove
Route::delete('/savelater/destroy/{product}','\App\Http\Controllers\Front\SaveLaterController@destroy' )->name('savelater.destroy');
Route::post('/cart/moveToCart/{product}','\App\Http\Controllers\Front\SaveLaterController@moveToCart' )->name('moveToCart');


Route::get('empty', function() {
   Cart::instance('default')->destroy();
});
 
//checkout

Route::get('/checkout','\App\Http\Controllers\Front\CheckoutController@index');
Route::post('/checkout','\App\Http\Controllers\Front\CheckoutController@store')->name('checkout');