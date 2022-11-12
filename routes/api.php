<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\Auth\TokenAuthenticationController;

Route::post('/tokens/create', [TokenAuthenticationController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/tokens/revoke', [TokenAuthenticationController::class, 'destroy']);
    Route::post('/tokens/revoke-all', [TokenAuthenticationController::class, 'destroyAll']);

    Route::get('/user', [UserController::class, 'show']);

    Route::post('/facilities', [FacilityController::class, 'store']);
    Route::get('/facilities', [FacilityController::class, 'index']);
    Route::get('/facilities/{facility}', [FacilityController::class, 'show']);
    Route::get('/facilities/{facility}/edit', [FacilityController::class, 'edit']);
    Route::patch('/facilities/{facility}', [FacilityController::class, 'update']);
    Route::delete('/facilities/{facility}', [FacilityController::class, 'destroy']);

    Route::get('/managers', [ManagerController::class, 'index']);
});
