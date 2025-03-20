<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImcController;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('HomeView');
});

Route::get('/ImcView', [ImcController::class, 'index']);
Route::post('/ImcResultView', [ImcController::class, 'calcular']);

Route::get('/SonoView', [SonoController::class, 'index']);
Route::post('/SonoResultView', [SonoController::class, 'calcular']);
