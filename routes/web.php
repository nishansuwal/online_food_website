<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PurchasedController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'home'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/food/addToCart/{id}',[CartController::class,'addToCart'])->name('food.addToCart');

    //cart
    Route::get('/cart',[CartController::class,'viewCart'])->name('cart');

    //purchased
    Route::post('/purchased',[PurchasedController::class,'purchased'])->name('purchased');
    Route::post('/purchasedStore',[PurchasedController::class,'purchasedStore'])->name('purchasedStore');
    Route::post('/purchasedStoreInc',[PurchasedController::class,'purchasedStoreInc'])->name('purchasedStoreInc');
    Route::post('/purchasedStoreDec',[PurchasedController::class,'purchasedStoreDec'])->name('purchasedStoreDec');


});

require __DIR__.'/auth.php';




Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function(){
            Route::get('login', [AuthenticatedSessionController::class,'create'])->name('login'); 
            Route::post('login', [AuthenticatedSessionController::class,'store'])->name('admin.login'); 
            
            Route::get('dashboard', [AuthenticatedSessionController::class,'home'])->name('dashboard'); 

            Route::get('/food/index',[FoodController::class,'index'])->name('food.index');
            Route::get('/food/add',[FoodController::class,'create'])->name('food.add');
            Route::post('/food/store',[FoodController::class,'store'])->name('food.store');
            Route::post('/food/delete/{id}',[FoodController::class,'destroy'])->name('food.delete');
            Route::get('/food/edit/{id}',[FoodController::class,'edit'])->name('food.edit');
            Route::post('/food/update/{id}',[FoodController::class,'update'])->name('food.update');
        

    });
});


