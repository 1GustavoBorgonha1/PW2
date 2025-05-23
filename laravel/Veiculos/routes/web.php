<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MarcaController;
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

    Route::get('/marca', [MarcaController::class, 'index'])->name('marca.index');
    Route::get('/marca/create', [MarcaController::class, 'create'])->name('marca.create');
    Route::post('/marca', [MarcaController::class, 'store'])->name('marca.store');
    Route::get('/marca/{marca}/edit', [MarcaController::class, 'edit'])->name('marca.edit');
    Route::put('/marca/{marca}', [MarcaController::class, 'update'])->name('marca.update');
    Route::delete('/marca/{marca}', [MarcaController::class, 'destroy'])->name('marca.destroy');

    Route::get('/item', [ItemController::class, 'index'])->name('item.index');
    Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
    Route::post('/item', [ItemController::class, 'store'])->name('item.store');
    Route::get('/item/{item}/edit', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/{item}', [ItemController::class, 'update'])->name('item.update');
    Route::delete('/item/{item}', [ItemController::class, 'destroy'])->name('item.destroy');

});

require __DIR__.'/auth.php';
