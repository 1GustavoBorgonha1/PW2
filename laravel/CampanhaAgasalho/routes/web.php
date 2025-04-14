<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\ItemController;
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
});

Route::middleware(['auth'])->group(function () {
    Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');

    // Rotas para edição
    Route::get('/categoria/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::put('/categoria/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');

    // Rota para exclusão
    Route::delete('/categoria/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/local', [LocalController::class, 'index'])->name('local.index');
    Route::get('/local/create', [LocalController::class, 'create'])->name('local.create');
    Route::post('/local', [LocalController::class, 'store'])->name('local.store');

    // Rotas para edição
    Route::get('/local/{local}/edit', [LocalController::class, 'edit'])->name('local.edit');
    Route::put('/local/{local}', [LocalController::class, 'update'])->name('local.update');

    // Rota para exclusão
    Route::delete('/local/{local}', [LocalController::class, 'destroy'])->name('local.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/item', [ItemController::class, 'index'])->name('item.index');
    Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
    Route::post('/item', [ItemController::class, 'store'])->name('item.store');

    // Rotas para edição
    Route::get('/item/{item}/edit', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/{item}', [ItemController::class, 'update'])->name('item.update');

    // Rota para exclusão
    Route::delete('/item/{item}', [ItemController::class, 'destroy'])->name('item.destroy');
});


require __DIR__.'/auth.php';


