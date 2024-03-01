<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\FarmerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ImageController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/farmer', [LoginController::class, "farmerLogin"]);
Route::get('/farmerRegistration', [LoginController::class, "farmerRegistration"]);
Route::get('/buyer', [LoginController::class, "buyerlogin"]);
Route::get('/buyerRegistration', [LoginController::class, "buyerRegistration"]);

// Processes Login, Logout and Register
Route::post('/farmerRegistration', [ProcessController::class, "farmerRegistration"]);
Route::post('/buyerRegistration', [ProcessController::class, "buyerRegistration"]);
Route::post('/buyerLogin', [ProcessController::class, "buyerLogin"]);
Route::post('/farmerLogin', [ProcessController::class, "farmerLogin"]);
Route::post('/logout', [ProcessController::class, "logout"]);

// Dashboard
Route::get("/dashboard", function () {
    if (Auth::check()) {
        $b = Auth::user()->type;
        if ($b == 0) {
            return view("farmerportal");
        } else {
            $b = Product::orderBy('updated_at', 'desc')->get();

            return view("buyerportal", [
                "products" => $b
            ]);
        }
    } else {
        return redirect("/");
    }
});

// Farmer Side
Route::get("/addNewProduct", [FarmerController::class, "addNewProduct"]);
Route::post("/addNewProduct", [FarmerController::class, "addNewProductPost"]);
Route::get("/editProduct/{id}", [FarmerController::class, "editProduct"]);
Route::post("/editProduct/{id}", [FarmerController::class, "editProductPost"]);
Route::get("/deleteProduct/{id}", [FarmerController::class, "deleteProduct"]);
Route::get("/viewMyProduct", [FarmerController::class, "viewMyProduct"]);
Route::get("/processBuy/{id}", [BuyerController::class, "processBuy"]);

Route::get("/viewOrders", [FarmerController::class, "viewOrders"]);
Route::get("/deliverOrders/{id}", [FarmerController::class, "has_deliver"]);
Route::get("/orderBill/{id}", [FarmerController::class, "bill_detail"]);
Route::get("/profile", [BuyerController::class, "profile"]);
Route::get("/search", [BuyerController::class, "search"]);


// routes/web.php

Route::post("/processBuy/{id}", [BuyerController::class, "processBuy"])->name('processBuy');
