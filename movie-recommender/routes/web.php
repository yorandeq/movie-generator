<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\OllamaController;

Route::get('/', [MovieController::class, 'index']);
Route::get('/random-movie', [OllamaController::class, 'showRandomMovie']);