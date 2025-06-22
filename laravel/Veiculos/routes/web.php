<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\VeiculoController;
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

    Route::get('/veiculo', [VeiculoController::class, 'index'])->name('veiculo.index');
    Route::get('/veiculo/create', [VeiculoController::class, 'create'])->name('veiculo.create');
    Route::post('/veiculo', [VeiculoController::class, 'store'])->name('veiculo.store');
    Route::get('/veiculo/{veiculo}', [VeiculoController::class, 'show'])->name('veiculo.show');
    Route::get('/veiculo/{veiculo}/edit', [VeiculoController::class, 'edit'])->name('veiculo.edit');
    Route::put('/veiculo/{veiculo}', [VeiculoController::class, 'update'])->name('veiculo.update');
    Route::delete('/veiculo/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculo.destroy');

});

require __DIR__.'/auth.php';
