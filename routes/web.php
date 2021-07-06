<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController ;
use App\Http\Controllers\Backend\ErrorController ;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Login\AdminLoginController ;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Backend\ProductController ;
use  App\Http\Controllers\Backend\OrderController;
// FE
use App\Http\Controllers\Frontend\HomePageController;


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


Route::prefix('/admin')->middleware('can_open_admin')->group(function($router) {
    // dashboard
    $router->get('/' , [DashboardController::class , 'index'])->name("dashboard.index");
    // end dashboard
    // category
      $router->get('/categories' , [CategoryController::class , 'index'])->name("category.index");
      $router->get('/categories/create' , [CategoryController::class , 'create'])->name("category.create");
      $router->post('/categories/store', [CategoryController::class , 'store'])->name('category.store');
      $router->get('/categories/edit/{id}' , [CategoryController::class , 'edit'])->name('category.edit');
      $router->post('/categories/update/{id}' , [CategoryController::class , 'update'])->name("category.update");
      $router->get('categories/remove/{id}', [CategoryController::class , 'delete'])->name('category.remove');
    // end category

    // Start Product
    $router->get('/products', [ProductController::class , 'index'])->name("product.index") ;
    $router->get('/products/create' , [ProductController::class , 'create'])->name("product.create");
    $router->post("/products/store" , [ProductController::class , 'store'])->name("product.store");
    $router->get("/product/edit/{id}" , [ProductController::class , 'edit'])->name("product.edit");
    $router->post("/product/update/{id}" , [ProductController::class , 'update'])->name("product.update");
    $router->get('product/remove/{id}' , [ProductController::class , 'remove'])->name("product.remove");
    // End Product

    // Start Order
    $router->get("/orders", [OrderController::class , 'index'])->name("order.index");
    $router->get("/orders/create", [OrderController::class , 'create'])->name("order.create");


    // End Order

});
// Start Errors
Route::get('404' ,[ErrorController::class , 'Errors'])->name("404");
// End Errors

// Start Login
Route::get('/login' ,[AdminLoginController::class , 'LoginPage'])->name('login');
Route::post('/post_login' , [AdminLoginController::class , 'LoginPost'])->name('login.post') ;
Route::get('/logout' , [AdminLoginController::class , 'logout'])->name('logout') ;
// End Login

//Start FE
    Route::get("/" , [HomePageController::class , 'index'])->name("homepage") ;
// End FE


