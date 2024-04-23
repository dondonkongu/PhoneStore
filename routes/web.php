<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
      
});
Route::middleware('checkAdmin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/',[AdminController::class,'index'])->name('adminDashboard');
        Route::get('/display-product',[AdminController::class,'show'])->name('showProduct');
        Route::post('/product-store',[AdminController::class,'store'])->name('storeProduct');
        Route::get('/type-product-create',[AdminController::class,'typeProductEdit'])->name('editTypeProduct');
        Route::post('/type-product-store',[AdminController::class,'typeProductStore'])->name('storeTypeProduct');
        Route::post('/delete-product',[AdminController::class,'deleteProduct'])->name('delete-product');
        Route::get('/product-create',[AdminController::class,'editProduct'])->name('editProduct');
        Route::get('/manage-users',[AdminController::class,'displayUsers'])->name('displayUsers');
        Route::get('/manage-bills',[AdminController::class,'displayBills'])->name('displayBills');

       
    });
      
});



Route::get('gio-hang',[ProductController::class,'showCart'])->name('showCart');
Route::get('thanh-toan',[ProductController::class,'payment'])->name('payment');
Route::post('store-payment',[ProductController::class,'storePayment'])->name('storePayment');





require __DIR__.'/auth.php';
