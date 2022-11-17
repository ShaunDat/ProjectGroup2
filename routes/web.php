<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\SupplierController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\ProductController;
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


Route::get('/',[App\Http\Controllers\frontend\SiteController::class,'index'])->name('site.home');

//contact
Route::get('contact',[App\Http\Controllers\frontend\ContactController::class,'index'])->name('contact.index');

//admin
Route::prefix('admin')->group(function(){
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
    // Category
    Route::resource('category', CategoryController::class);
    Route::get('category-trash',[CategoryController::class, 'trash'])->name('category-trash'); 
    Route::get('category/{id}/status',[CategoryController::class, 'status'])->name('category.status'); 
    Route::get('category/{id}/deltrash',[CategoryController::class, 'deltrash'])->name('category.deltrash'); 
    Route::get('category/{id}/retrash',[CategoryController::class, 'retrash'])->name('category.retrash'); 

    // Topic
    Route::resource('topic', TopicController::class);
    Route::get('topic-trash',[TopicController::class, 'trash'])->name('topic-trash'); 
    Route::get('topic/{id}/status',[TopicController::class, 'status'])->name('topic.status'); 
    Route::get('topic/{id}/deltrash',[TopicController::class, 'deltrash'])->name('topic.deltrash'); 
    Route::get('topic/{id}/retrash',[TopicController::class, 'retrash'])->name('topic.retrash');

    // Supplier
    Route::resource('supplier', SupplierController::class);
    Route::get('supplier-trash',[SupplierController::class, 'trash'])->name('supplier-trash'); 
    Route::get('supplier/{id}/status',[SupplierController::class, 'status'])->name('supplier.status'); 
    Route::get('supplier/{id}/deltrash',[SupplierController::class, 'deltrash'])->name('supplier.deltrash'); 
    Route::get('supplier/{id}/retrash',[SupplierController::class, 'retrash'])->name('supplier.retrash'); 
    
    // Product
    Route::resource('product', ProductController::class);
    Route::get('product-trash',[ProductController::class, 'trash'])->name('product-trash'); 
    Route::get('product/{id}/status',[ProductController::class, 'status'])->name('product.status'); 
    Route::get('product/{id}/deltrash',[ProductController::class, 'deltrash'])->name('product.deltrash'); 
    Route::get('product/{id}/retrash',[ProductController::class, 'retrash'])->name('product.retrash'); 
    
    // Post
    Route::resource('post', PostController::class);
    Route::get('post-trash',[PostController::class, 'trash'])->name('post-trash'); 
    Route::get('post/{id}/status',[PostController::class, 'status'])->name('post.status'); 
    Route::get('post/{id}/deltrash',[PostController::class, 'deltrash'])->name('post.deltrash'); 
    Route::get('post/{id}/retrash',[PostController::class, 'retrash'])->name('post.retrash'); 
    
    // Page
    Route::resource('page', PageController::class);
    Route::get('page-trash',[PageController::class, 'trash'])->name('page-trash'); 
    Route::get('page/{id}/status',[PageController::class, 'status'])->name('page.status'); 
    Route::get('page/{id}/deltrash',[PageController::class, 'deltrash'])->name('page.deltrash'); 
    Route::get('page/{id}/retrash',[PageController::class, 'retrash'])->name('page.retrash'); 

    // Order
    Route::resource('order', OrderController::class);
    Route::get('order-trash',[OrderController::class, 'trash'])->name('order-trash'); 
    Route::get('order/{id}/status',[OrderController::class, 'status'])->name('order.status'); 
    Route::get('order/{id}/deltrash',[OrderController::class, 'deltrash'])->name('order.deltrash'); 
    Route::get('order/{id}/retrash',[OrderController::class, 'retrash'])->name('order.retrash'); 

    // Customer
    Route::resource('customer', CustomerController::class);
    Route::get('customer-trash',[CustomerController::class, 'trash'])->name('customer-trash'); 
    Route::get('customer/{id}/status',[CustomerController::class, 'status'])->name('customer.status'); 
    Route::get('customer/{id}/deltrash',[CustomerController::class, 'deltrash'])->name('customer.deltrash'); 
    Route::get('customer/{id}/retrash',[CustomerController::class, 'retrash'])->name('customer.retrash'); 





    
    // Category
    //     Route::prefix('category')->group(function(){
    //     Route::get('/',[CategoryController::class, 'index'])->name('category');
    //     Route::get('category-trash',[CategoryController::class, 'trash'])->name('category.trash'); 
    //     Route::get('create',[CategoryController::class, 'create'])->name('category.create'); 
    //     Route::get('store',[CategoryController::class, 'store'])->name('category.store'); 
    // });

});
