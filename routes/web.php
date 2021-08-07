<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ErrorController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Login\AdminLoginController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Backend\ProductController;
use  App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\UserController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\CommentController;

// FE
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\ProductDetailController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PaymentController;


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
Route::get('abc', function () {

    $adminRole = Role::find(2);
    $editorRole = Role::find(3);
    $modRole = Role::find(3);
    $addProPer = Permission::find(1);
    $removeProPer = Permission::find(2);

    $adminRole->givePermissionTo($addProPer);
    $adminRole->givePermissionTo($removeProPer);
    $editorRole->givePermissionTo($addProPer);
    $modRole->givePermissionTo($removeProPer);

    $adminAcc = \App\Models\User::find(1);
    $adminAcc->assignRole('Admin');
    $modAcc = \App\Models\User::find(7);
    $modAcc->assignRole("moderator");


});

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::prefix('/admin')->middleware("auth")->group(function ($router) {
    // dashboard
    $router->get('/', [DashboardController::class, 'index'])->name("dashboard.index");
    // end dashboard

    $router->middleware("role:Admin|Content|Editor|Sales|admin_category")->group(function ($router) {
        // Start Product
        $router->get('/products', [ProductController::class, 'index'])->name("product.index");
        $router->get('/products/create', [ProductController::class, 'create'])->name("product.create");
        $router->post("/products/store", [ProductController::class, 'store'])->name("product.store");
        $router->get("/product/edit/{id}", [ProductController::class, 'edit'])->name("product.edit");
        $router->post("/product/update/{id}", [ProductController::class, 'update'])->name("product.update");
        $router->get('product/remove/{id}', [ProductController::class, 'remove'])->name("product.remove")
            ->middleware("permission:Xóa sản phẩm");
        // End Product
        // category
        $router->get('/categories', [CategoryController::class, 'index'])->name("category.index");
        $router->get('/categories/create', [CategoryController::class, 'create'])->name("category.create");
        $router->post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
        $router->get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        $router->post('/categories/update/{id}', [CategoryController::class, 'update'])->name("category.update");
        $router->get('categories/remove/{id}', [CategoryController::class, 'delete'])->name('category.remove')
            ->middleware("permission:Xóa danh mục");
        // end category

        // Start Order
        $router->get("/orders", [OrderController::class, 'index'])->name("order.index");
        $router->get("/orders/create", [OrderController::class, 'create'])->name("order.create");
        $router->post("/orders/store", [OrderController::class, 'store'])->name("order.store");
        $router->get("/orders/edit/{id}", [OrderController::class, 'edit'])->name("order.edit");
        $router->post("/orders/update/{id}", [OrderController::class, 'update'])->name('order.update');
        $router->get("/orders/delete/{id}", [OrderController::class, 'delete'])->name("order.delete")
            ->middleware("permission:Xóa đơn hàng");
        // End Order

        // Start Ajax Order
        $router->post("/orders/searchProduct", [OrderController::class, 'singleProduct'])->name("search");
        $router->post("/order/ajaxAddProduct", [OrderController::class, 'ajaxAddProduct'])->name("ajaxAdd");
        // End Ajax Order

        // Start User
        $router->get("/users", [UserController::class, 'index'])->name("user.index");
        $router->get("/users/create", [UserController::class, 'create'])->name("user.create");
        $router->post("users/store", [UserController::class, 'store'])->name("user.store");

        $router->post("users/save/{id}", [UserController::class, 'SaveProfile'])->name("user.save");
        $router->get("users/edit/{id}", [UserController::class, 'edit'])->name("user.edit");
        $router->post("users/update/{id}", [UserController::class, 'update'])->name("user.update");
        $router->get("users/remove/{id}", [UserController::class, 'delete'])->name("user.delete");
        // End User

        // Start Roles
        $router->get("roles", [RoleController::class, 'index'])->name("role.index");
        $router->get("roles/create", [RoleController::class, 'create'])->name("role.create");
        $router->post('roles/store', [RoleController::class, 'store'])->name("role.store");
        $router->get("roles/edit/{id}", [RoleController::class, 'edit'])->name("role.edit");
        $router->post("roles/update/{id}", [RoleController::class, 'update'])->name("role.update");
        $router->get("/roles/delete/{id}", [RoleController::class, 'delete'])->name("role.delete");
        // End Start Roles

        // start comment.
        $router->get("comment", [CommentController::class, 'index'])->name("comment.index");
        // End comment.

    });
    $router->get("users/profile/{id}", [UserController::class, 'profile'])->name("user.profile");
});
// Start Errors
Route::get('404', [ErrorController::class, 'Errors'])->name("404");
Route::get("403", [ErrorController::class, 'permission'])->name("403");
// End Errors


// Start Login
Route::get('/login', [AdminLoginController::class, 'LoginPage'])->name('login');
Route::post('/post_login', [AdminLoginController::class, 'LoginPost'])->name('login.post');
Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');
// End Login

//start post comment
Route::post("/cmt", [CommentController::class, 'displayComment'])->name("cmt");
Route::get("delete/{id}", [CommentController::class, 'deleteComment'])->name("deleteCmt");
//end post comment.

//Start FE

Route::prefix('/')->group(function ($router) {
    //home page
    $router->get('', [HomePageController::class, 'index'])->name("homepage");
    // End homepage

    // Products All
    $router->get('/products', [ShopController::class, 'shop'])->name('shop.products');
    // End Products All

    // Product Detail
    $router->get("/product/{id}", [ProductDetailController::class, 'ProductDetail'])->name("product.detail");
    //End product detail

    //Product Category
    $router->get("/products/category/{id}", [ShopController::class, 'productCategory'])->name("product.category");
    // End Products Category

    // Cart
    $router->get("/add_cart/{id}", [CartController::class, 'addCart'])->name("addCart");
    $router->get("/cart", [CartController::class, 'showCart'])->name("cart.show");
    $router->get("/cart/update", [CartController::class, 'update'])->name("cart.update");
    $router->get("/cart/delete", [CartController::class, 'delete'])->name("cart.delete");
    $router->get("/cart/clear", [CartController::class, 'clearCart'])->name("cart.clear");
    // End cart

    //Payment method
    $router->get("/payment", [PaymentController::class, 'index'])->name("payment.index");
    $router->post("/checkout", [PaymentController::class, 'checkout'])->name("checkout");
    //  //End Payment method
});
// End FE


