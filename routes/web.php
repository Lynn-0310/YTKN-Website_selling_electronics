<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestsController;
use App\Http\Middleware\CheckAdmin;

Route::get('/', [GuestsController::class, 'index'])->name('welcome');
Route::get('/introduction', [GuestsController::class, 'introduction'])->name('introduction');

Route::get('/products', [GuestsController::class, 'products'])->name('products');
Route::get('/products/detail/{id}', [GuestsController::class, 'productshow'])->name('product.show');

Route::get('/articles', [GuestsController::class, 'articles'])->name('articles');
Route::get('/articles/detail/{id}', [GuestsController::class, 'articleshow'])->name('article.show');

Route::get('/documents', [GuestsController::class, 'loadDocuments'])->name('documents');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/cart/{product}', [GuestsController::class, 'add'])->name('cart.add');
    Route::get('/cart/remove/{id}', [GuestsController::class, 'removeFromCart'])->name('cart.remove');

    Route::get('/shopping/cart', [GuestsController::class, 'shoppingCart'])->name('shopping.cart');
    Route::post('/shopping/cart/upadte', [GuestsController::class, 'updateCart'])->name('shopping.update');
   
    Route::get('/checkout', [GuestsController::class, 'viewCheckout'])->name('shopping.checkout');

    Route::post('/checkout/store', [GuestsController::class, 'checkoutStore'])->name('checkout.store');


});

Route::middleware([CheckAdmin::class])->group(function () {


    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/infor', [AdminController::class, 'infor']);
   
    Route::get('/load-products', [AdminController::class, 'loadProducts']);
    Route::get('/add-products', [AdminController::class, 'createproduct']);

    Route::get('/edit-products/{id}', [AdminController::class, 'editproduct'])->name('products.edit');
    Route::put('/admin/edit-products/{id}', [AdminController::class, 'updateproduct'])->name('products.update');

    Route::post('/store-products', [AdminController::class, 'storeproduct'])->name('products.store');
    Route::delete('/products/{id}', [AdminController::class, 'destroyproduct'])->name('products.destroy');



    Route::get('/load-articles', [AdminController::class, 'loadArticles']);

    Route::get('/add-articles', [AdminController::class, 'createarticle']);
    Route::post('/store-articles', [AdminController::class, 'storearticle'])->name('articles.store');

    Route::get('/edit-articles/{id}', [AdminController::class, 'editarticle'])->name('articles.edit');
    Route::put('/admin/edit-articles/{id}', [AdminController::class, 'updatearticle'])->name('articles.update');

    Route::delete('/articles/{id}', [AdminController::class, 'destroyarticle'])->name('articles.destroy');

    Route::get('/load-orders', [AdminController::class, 'loadOrder']);
    Route::put('/orders/{id}/status', [AdminController::class, 'updateStatus'])->name('orders.updateStatus');

    Route::get('/load-users', [AdminController::class, 'loadUser']);
    Route::put('/users/{id}/role', [AdminController::class, 'updateRole'])->name('users.updateRole');
    Route::put('/users/{id}/password', [AdminController::class, 'updatePassword'])->name('users.updatePassword');



    Route::get('/load-documents', [AdminController::class, 'loadDocuments']);
    Route::get('/add-documents', [AdminController::class, 'createDocuments']);
    Route::post('/store-documents', [AdminController::class, 'uploadFile'])->name('documents.store');
    Route::delete('documents/{file}', [AdminController::class, 'deleteFile'])->name('documents.delete');
    


});

require __DIR__.'/auth.php';
