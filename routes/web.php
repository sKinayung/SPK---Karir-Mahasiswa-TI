<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\SpkController;

Route::get('/', [SpkController::class, 'index']);
Route::post('/calculate', [SpkController::class, 'calculate']);
