<?php

use App\Http\Controllers\MovimentoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemMovimentoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/categoria/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::put('/categoria/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::delete('/categoria/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

    Route::get('/local', [LocalController::class, 'index'])->name('local.index');
    Route::get('/local/create', [LocalController::class, 'create'])->name('local.create');
    Route::post('/local', [LocalController::class, 'store'])->name('local.store');
    Route::get('/local/{local}/edit', [LocalController::class, 'edit'])->name('local.edit');
    Route::put('/local/{local}', [LocalController::class, 'update'])->name('local.update');
    Route::delete('/local/{local}', [LocalController::class, 'destroy'])->name('local.destroy');

    Route::get('/item', [ItemController::class, 'index'])->name('item.index');
    Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
    Route::post('/item', [ItemController::class, 'store'])->name('item.store');
    Route::get('/item/{item}/edit', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/{item}', [ItemController::class, 'update'])->name('item.update');
    Route::delete('/item/{item}', [ItemController::class, 'destroy'])->name('item.destroy');


    Route::get('/movimento', [MovimentoController::class, 'index'])->name('movimento.index');
    Route::get('/movimento/create', [MovimentoController::class, 'create'])->name('movimento.create');
    Route::post('/movimento', [MovimentoController::class, 'store'])->name('movimento.store');
    Route::delete('/movimento/{movimento}', [MovimentoController::class, 'destroy'])->name('movimento.destroy');

    Route::get('/movimento/{movimento}/itens/create', [ItemMovimentoController::class, 'create'])->name('movimento.item_create');
    Route::post('/movimento/itens', [ItemMovimentoController::class, 'store'])->name('itens_movimento.store');
});

require __DIR__.'/auth.php';
