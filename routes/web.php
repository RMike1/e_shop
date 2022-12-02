<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;



Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::get('login',[UserController::class,'index']);

Route::get('register',[UserController::class,'reg']);

Route::post('register_user',[UserController::class,'register']);

Route::post('login_user',[UserController::class,'login']);

Route::get('/',[ProductController::class,'index']);

Route::get('view_item/{id}',[ProductController::class,'view']);

Route::post('add_to_cart/{id}',[ProductController::class,'Add_To_Cart']);

Route::get('cartlist',[ProductController::class,'CartList']);

Route::get('remove_item/{id}',[ProductController::class,'RemoveItem']);

Route::get('search',[ProductController::class,'Search']);

Route::post('search',[ProductController::class,'Search']);

Route::get('blank',[ProductController::class,'Search']);

Route::get('order_by_card',[ProductController::class,'OrderByCard']);

Route::get('payment_by_cash',[ProductController::class,'OrderByCash']);

Route::post('payment_on_delivery',[ProductController::class,'Order_now']);

Route::get('cancel/order/{id}',[ProductController::class,'cancel_order']);


//======================== Admin Routes===================================



Route::get('admin_panel',[AdminController::class,'index']);

Route::get('view_products',[AdminController::class,'ViewProducts']);

Route::get('view_users',[AdminController::class,'ViewUsers']);

Route::get('view_orders',[AdminController::class,'ViewOrders']);

Route::get('view_cartlist',[AdminController::class,'ViewCartList']);

Route::get('approve_payment/{id}',[AdminController::class,'ApprovePayment']);

Route::get('add/item',[AdminController::class,'Products']);

Route::post('product/create',[AdminController::class,'AddProducts']);

Route::get('delete/product/{id}',[AdminController::class,'DeleteProduct']);

Route::get('edit/product/{id}',[AdminController::class,'EditProduct']);

Route::post('update/product/{id}',[AdminController::class,'UpdateProduct']);

Route::get('search_products',[AdminController::class,'SearchProducts']);

Route::get('search_items',[AdminController::class,'SearchProducts']);

Route::post('search_products',[AdminController::class,'SearchProducts']);

Route::get('/',[AdminController::class,'Redirect']);

Route::get('send_email/{id}',[AdminController::class,'send_email']);

Route::post('send_user_email/{id}',[AdminController::class,'send_user_email']);

Route::post('search/orders',[AdminController::class,'search_orders']);

Route::get('view/order/{id}',[AdminController::class,'view_id_order']);



