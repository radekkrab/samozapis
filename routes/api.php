<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SpecialistController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\AvailabilityController;
use Illuminate\Support\Facades\Route;

// Группа маршрутов с middleware для аутентификации
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('specialists', SpecialistController::class);
    Route::apiResource('appointments', AppointmentController::class);
    Route::apiResource('availability', AvailabilityController::class);
});

