<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ProfileController;
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

// ----------Front Panel-----------
Route::get('/', function () {
    return view('welcome');
});






// ----------Admin Panel-----------
Route::middleware('auth','role:admin')->group(function () {    
    Route::controller(DashboardController::class)->group(function(){
    Route::get('/admin', 'index')->name('admin');
    });  

    //categories
    Route::controller(CategoryController::class)->group(function(){
    Route::get('/admin/categories', 'index')->name('categories');
    Route::get('/admin/add-category', 'Add')->name('addcategory');
    });  
    Route::controller(SubCategoryController::class)->group(function(){
    Route::get('/admin/sub-categories', 'index')->name('subcategories');
    Route::get('/admin/add-sub-category', 'Add')->name('addsubcategory');
    });  

    //porducts and orders
    Route::controller(ProductController::class)->group(function(){
    Route::get('/admin/products', 'index')->name('products');
    Route::get('/admin/add-product', 'Add')->name('addproduct');
    });  
    Route::controller(OrderController::class)->group(function(){
        Route::get('/admin/succss-orders', 'Success')->name('succssorders');
        Route::get('/admin/pending-orders', 'Pending')->name('pendingorders');
    Route::get('/admin/cancel-orders', 'cancel')->name('cancelorders');
    });  
});







// ----------User Panel-----------
Route::middleware('auth','role:user')->group(function () {  
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProfileController::class)->group(function(){
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy'); 
    });    
});

require __DIR__.'/auth.php';
