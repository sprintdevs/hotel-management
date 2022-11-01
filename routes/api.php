<?php

use App\Http\Controllers\Auth\TokenAuthenticationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/tokens/create', [TokenAuthenticationController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/tokens/revoke', [TokenAuthenticationController::class, 'destroy']);
    Route::post('/tokens/revoke-all', [TokenAuthenticationController::class, 'destroyAll']);

    Route::get('/user', [UserController::class, 'show']);

    Route::post('/facilities', [FacilityController::class, 'store']);
    Route::get('/facilities', [FacilityController::class, 'index']);
});
