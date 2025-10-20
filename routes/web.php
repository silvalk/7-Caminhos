<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminPromocaoController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Storage;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;


Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/order', [CartController::class, 'placeOrder'])->middleware('auth')->name('cart.order');
Route::view('/cart', 'cart')->name('cart');
Route::post('/cart/validate-products', function (Request $request) {
    $ids = $request->input('ids', []);

    if (!is_array($ids) || empty($ids)) {
        return response()->json([], 200);
    }

    $produtos = Produto::whereIn('id', $ids)->get();

    $produtos = $produtos->map(function ($produto) {
        return [
            'id' => $produto->id,
            'nome' => $produto->nome,
            'preco' => $produto->preco,
            'imagem' => $produto->imagem ? '/storage/' . $produto->imagem : '/storage/default.jpg',
            'descricao' => $produto->descricao,
            'categoria' => $produto->categoria,
        ];
    });

    return response()->json($produtos);
});



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [HomeController::class, 'products'])->name('products');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/reviews', [ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'show'])->name('user.profile');
    Route::put('/user', [UserController::class, 'updateName'])->name('user.updateName');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'auth'])->name('admin.auth');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios');
        Route::delete('/usuarios/{id}', [AdminController::class, 'excluirUsuario'])->name('admin.usuarios.excluir');

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');  

        Route::get('/produtos', [AdminController::class, 'produtos'])->name('admin.produtos');
        Route::get('/produtos/create', [AdminController::class, 'createProduto'])->name('admin.produtos.create');
        Route::post('/produtos', [AdminController::class, 'storeProduto'])->name('admin.produtos.store');
        Route::get('/produtos/{id}/edit', [AdminController::class, 'editProduto'])->name('admin.produtos.edit');
        Route::put('/produtos/{id}', [AdminController::class, 'updateProduto'])->name('admin.produtos.update');
        Route::delete('/produtos/{id}', [AdminController::class, 'destroyProduto'])->name('admin.produtos.destroy');

        Route::get('/pedidos', [AdminController::class, 'pedidos'])->name('admin.pedidos');
        Route::get('/pedidos/{id}', [AdminController::class, 'showPedido'])->name('admin.pedidos.show');
        Route::post('/pedidos/{id}/concluir', [AdminController::class, 'concluirPedido'])->name('admin.pedidos.concluir');

        Route::get('/feedbacks', [AdminController::class, 'feedbacks'])->name('admin.feedbacks');
        Route::delete('/feedbacks/{id}', [AdminController::class, 'destroyFeedback'])->name('admin.feedbacks.destroy');
        Route::get('/relatorios', [AdminController::class, 'relatorios'])->name('admin.relatorios');

        Route::get('/promocoes', [AdminPromocaoController::class, 'index'])->name('admin.promocoes.index');
        Route::get('/promocoes/create', [AdminPromocaoController::class, 'create'])->name('admin.promocoes.create');
        Route::post('/promocoes', [AdminPromocaoController::class, 'store'])->name('admin.promocoes.store');
        Route::get('/promocoes/{id}/edit', [AdminPromocaoController::class, 'edit'])->name('admin.promocoes.edit');
        Route::put('/promocoes/{id}', [AdminPromocaoController::class, 'update'])->name('admin.promocoes.update');
        Route::delete('/promocoes/{id}', [AdminPromocaoController::class, 'destroy'])->name('admin.promocoes.destroy');
    });
});
