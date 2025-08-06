<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\Principal::class, 'login'])->name('login');
Route::get('/home', [App\Http\Controllers\Principal::class, 'home'])->name('home');
Route::get('/categoria', [App\Http\Controllers\Principal::class, 'categoria'])->name('categoria');
Route::get('/perfil', [App\Http\Controllers\Principal::class, 'perfil'])->name('perfil');

