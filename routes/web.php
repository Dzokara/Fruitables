<?php

use App\Http\Controllers\FruitsController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/fruits/{id}', [FruitsController::class, 'show'])->name('fruit');
Route::get('/fruits', [FruitsController::class, 'index'])->name('fruits');
Route::get('/fruits-filter', [FruitsController::class, 'filter'])->name('filter');
Route::post('/review',[\App\Http\Controllers\RatingController::class,"insertRating"])->name("rating.review");
Route::get('/404',[\App\Http\Controllers\NotFoundController::class,'index'])->name('404');
Route::get('/contact',[\App\Http\Controllers\ContactController::class,'index'])->name('contact');
Route::post('/contact',[\App\Http\Controllers\ContactController::class,'insertMessage'])->name('contact.insert');

Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function (){
    Route::get('/admin',[\App\Http\Controllers\AdminController::class,'index'])->name('admin.home');
    Route::get('/admin/fruits',[\App\Http\Controllers\AdminController::class,'fruits'])->name('admin.fruits');
    Route::get('/admin/categories',[\App\Http\Controllers\AdminController::class,'categories'])->name('admin.categories');
    Route::get('/admin/ratings',[\App\Http\Controllers\AdminController::class,'ratings'])->name('admin.ratings');
    Route::get('/admin/orders',[\App\Http\Controllers\AdminController::class,'orders'])->name('admin.orders');
    Route::get('/admin/messages',[\App\Http\Controllers\AdminController::class,'messages'])->name('admin.messages');
    Route::get('/admin/users',[\App\Http\Controllers\AdminController::class,'users'])->name('admin.users');
    Route::delete('/admin/fruits',[\App\Http\Controllers\FruitsController::class,'deleteFruit'])->name('admin.fruits.delete');
    Route::put('/admin/fruits',[\App\Http\Controllers\FruitsController::class,'updateFruit'])->name('admin.fruits.update');
});

Route::middleware(\App\Http\Middleware\GuestMiddleware::class)->group(function (){
    Route::post("/login", [\App\Http\Controllers\LoginController::class, "login"])->name("login.login");
    Route::get("/login", [\App\Http\Controllers\LoginController::class, "index"])->name("login.index");
    Route::post("/register", [\App\Http\Controllers\RegisterController::class, "register"])->name("register.register");
    Route::get("/register", [\App\Http\Controllers\RegisterController::class, "index"])->name("register.index");
});

Route::middleware(\App\Http\Middleware\LoggedInMiddleware::class)->group(function (){
    Route::get("/logout", function(\Illuminate\Http\Request $request) {
        $request->session()->forget("user");
        return redirect()->route("login.index");
    })->name("logout");
    Route::get('/cart',[\App\Http\Controllers\CartController::class,'index'])->name('cart');
    Route::post('/cart',[\App\Http\Controllers\CartController::class,'insertCart'])->name('cartAdd');
    Route::patch('/cart/qty',[\App\Http\Controllers\CartController::class,'updateQty'])->name('qtyUpdate');
    Route::delete('/cart',[\App\Http\Controllers\CartController::class,'deleteCart'])->name('cartDelete');
    Route::get('/checkout',[\App\Http\Controllers\CheckoutController::class,'index'])->name('checkout');
    Route::post('/checkout',[\App\Http\Controllers\CheckoutController::class,'insertOrder'])->name('orderCheckout');
    Route::get('orders',[\App\Http\Controllers\OrderController::class,'index'])->name('orders');
});

//
//Route::middleware(['auth'])->group(function() {
//    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('admin');
//    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store')->middleware('admin');
//    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//});
//

//Route::get('/all-products', [ProductController::class, 'getAll'])->name('all-products');
//
//Route::get('/contact', [ContactController::class, 'index'])->name('contact');
//
//Route::middleware(['notauth'])->group(function() {
//    Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
//    Route::post('/login', [AuthController::class, 'doLogin'])->name('login');
//});
