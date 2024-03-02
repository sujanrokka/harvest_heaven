<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Buyer;
use App\Http\Controllers\Farmer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'is_buyer'])->group(function () {

    Route::get('/dashboard/buyer', [Buyer\BuyerDashController::class,'index'])->name('dashbord.buyer');
    Route::get('/buyer/add/cart', [Buyer\BuyerDashController::class, 'viewCart'])->name('buyer.view.cart');
    Route::post('/buyer/add/cart/{id}', [Buyer\BuyerDashController::class, 'addToCart'])->name('buyer.add.cart');
    Route::delete('/buyer/delete/cart/{id}', [Buyer\BuyerDashController::class, 'deleteCartItem'])->name('buyer.delete.cart');
    Route::get('/buyer/order/placed/', [Buyer\BuyerDashController::class, 'placeOrder'])->name('buyer.place.order');



    Route::get('/buyer/view/order', [Buyer\BuyerDashController::class, 'viewOrder'])->name('buyer.view.order');


});

Route::middleware('auth', 'is_farmer')->group(function () {

    Route::get('/dashboard/farmer', [Farmer\FarmerDashController::class, 'index'])->name('dashbord.farmer');

    Route::get('/farmer/product', [Farmer\ProductController::class, 'index'])->name('farmer.product');
    Route::get('/farmer/product/add', [Farmer\ProductController::class, 'index_add'])->name('farmer.product.add');
    Route::post('/farmer/product', [Farmer\ProductController::class,'store'])->name('farmer.product.store');

    Route::get('/farmer/product/{product}/edit', [Farmer\ProductController::class, 'edit'])->name('farmer.product.edit');
    Route::put('/farmer/product/{product}', [Farmer\ProductController::class, 'update'])->name('farmer.product.update');
    Route::delete('/farmer/product/{product}', [Farmer\ProductController::class, 'destroy'])->name('farmer.product.destroy');


    Route::get('/farmer/view/order', [Farmer\ProductController::class, 'viewOrder'])->name('farmer.view.order');
    Route::post('/farmer/view/order/deliver/{order}', [Farmer\ProductController::class, 'orderDeliver'])->name('farmer.deliver.order');
    Route::get('/farmer/view/bill/{order}', [Farmer\ProductController::class, 'billView'])->name('farmer.view.bill');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
