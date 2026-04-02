<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BancaController;
use App\Http\Controllers\TccController;
use App\Models\Tcc; 

Route::get('/', [TccController::class, 'index']);
Route::resource('tccs', TccController::class);
Route::resource('bancas', BancaController::class);
