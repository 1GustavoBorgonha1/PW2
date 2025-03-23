<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImcController;
use App\Http\Controllers\SonoController;
use Illuminate\Support\Facades\View;
Route::get('/', function () {
    return view('HomeView');
});

Route::get('/ImcView', [ImcController::class, 'index']);
Route::post('/ImcResultView', [ImcController::class, 'calcular']);

// Rota para exibir o formulário
Route::get('/SonoView', [SonoController::class, 'index']);

// Rota para processar o formulário e exibir o resultado
Route::post('/SonoResultView', [SonoController::class, 'classificar']);

?>




