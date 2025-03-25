<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImcController;
use App\Http\Controllers\SonoController;
use App\Http\Controllers\GastoController;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('HomeView');
});

Route::get('/ImcView', [ImcController::class, 'index']);
Route::post('/ImcResultView', [ImcController::class, 'calcular']);

Route::get('/SonoView', [SonoController::class, 'index']);
Route::post('/ResultSonoView', [SonoController::class, 'classificar']);

Route::get('/GastoView', [GastoController::class, 'index']);
Route::post('/ResultGastoView', [GastoController::class, 'calcular']);
?>




