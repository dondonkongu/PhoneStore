<?php
   

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;



    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/home',[HomeController::class,'index'])->name('home');

   
    Route::get('product',function(){
        return view('layouts/content/product');
    })->name('product');

   
   Route::get('type-product',[ProductController::class,'showProduct'])->name('showTypeProduct');


   Route::get('chi-tiet-san-pham/{id}',[ProductController::class,'showDetailProduct'])->name('showDetailProduct');
// Route::post('store-faq',[ProductController::class,'storeProduct'])->name('storeProduct');



   
?>