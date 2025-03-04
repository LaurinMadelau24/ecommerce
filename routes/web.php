<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/',[HomeController::class,'home']);

Route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/dashboard', function () {
//     return view('home.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/DashboardAdmin',[HomeController::class,'index'])->Middleware(['auth','admin']);

route::get('view_category',[AdminController::class,'view_category'])->Middleware(['auth','admin']);

route::post('add_category',[AdminController::class,'add_category'])->Middleware(['auth','admin']);

route::get('delete_category/{id}',[AdminController::class,'delete_category'])->Middleware(['auth','admin']);

route::get('edit_category',[AdminController::class,'edit_category'])->Middleware(['auth','admin']);

route::post('update_category/{id}',[AdminController::class,'update_category'])->Middleware(['auth','admin']);

route::get('add_product',[AdminController::class,'add_product'])->Middleware(['auth','admin']);

route::post('upload_product',[AdminController::class,'upload_product'])->Middleware(['auth','admin']);

route::get('view_product',[AdminController::class,'view_product'])->Middleware(['auth','admin']);

route::get('delete_product/{id}',[AdminController::class,'delete_product'])->Middleware(['auth','admin']);

route::get('edit_product',[AdminController::class,'edit_product'])->Middleware(['auth','admin']);

route::post('update_product/{id}',[AdminController::class,'update_product'])->Middleware(['auth','admin']);

route::get('product_search',[AdminController::class,'product_search'])->Middleware(['auth','admin']);

route::get('detail_product/{id}',[HomeController::class,'detail_product']);

route::get('add_cart/{id}',[HomeController::class,'add_cart'])
->middleware(['auth', 'verified']);

route::get('mycart',[HomeController::class,'mycart'])
->middleware(['auth', 'verified']);

route::get('delete_cart/{id}',[HomeController::class,'delete_cart'])->Middleware(['auth','verified']);

route::post('comfirm_order',[HomeController::class,'comfirm_order'])->Middleware(['auth','verified']);

route::get('view_order',[AdminController::class,'view_order'])->Middleware(['auth','admin']);

route::get('perjalanan/{id}',[AdminController::class,'perjalanan'])->Middleware(['auth','admin']);

route::get('dikirim/{id}',[AdminController::class,'dikirim'])->Middleware(['auth','admin']);

