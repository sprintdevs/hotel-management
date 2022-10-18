<?php

use App\Http\Controllers\Auth\TokenAuthenticationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/token', [TokenAuthenticationController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('/user', [UserController::class, 'show']);
});
