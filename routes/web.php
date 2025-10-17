<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/order', [CartController::class, 'placeOrder'])->name('cart.order');
Route::view('/cart', 'cart')->name('cart');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [HomeController::class, 'products'])->name('products');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'auth'])->name('admin.auth');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('/produtos', [AdminController::class, 'produtos'])->name('admin.produtos');
        Route::get('/produtos/create', [AdminController::class, 'createProduto'])->name('admin.produtos.create');
        Route::post('/produtos', [AdminController::class, 'storeProduto'])->name('admin.produtos.store');
        Route::get('/produtos/{id}/edit', [AdminController::class, 'editProduto'])->name('admin.produtos.edit');
        Route::put('/produtos/{id}', [AdminController::class, 'updateProduto'])->name('admin.produtos.update');
        Route::delete('/produtos/{id}', [AdminController::class, 'destroyProduto'])->name('admin.produtos.destroy');

        Route::get('/pedidos', fn() => view('admin.pedidos'))->name('admin.pedidos');
        Route::get('/usuarios', fn() => view('admin.usuarios'))->name('admin.usuarios');
        Route::get('/feedbacks', fn() => view('admin.feedbacks'))->name('admin.feedbacks');
        Route::get('/relatorios', fn() => view('admin.relatorios'))->name('admin.relatorios');
    });
});
