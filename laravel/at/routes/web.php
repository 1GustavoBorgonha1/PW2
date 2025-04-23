<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TipoContatoController;
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

    Route::get('/tipocontato', [TipoContatoController::class, 'index'])->name('tipocontato.index');
    Route::get('/tipocontato/create', [TipoContatoController::class, 'create'])->name('tipocontato.create');
    Route::post('/tipocontato', [TipoContatoController::class, 'store'])->name('tipocontato.store');
    Route::get('/tipocontato/{tipocontato}/edit', [TipoContatoController::class, 'edit'])->name('tipocontato.edit');
    Route::put('/tipocontato/{tipocontato}', [TipoContatoController::class, 'update'])->name('tipocontato.update');
    Route::delete('/tipocontato/{tipocontato}', [TipoContatoController::class, 'destroy'])->name('tipocontato.destroy');

});

require __DIR__.'/auth.php';
