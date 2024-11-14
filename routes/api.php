<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomChatController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UserController;

// Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('room-chats', RoomChatController::class);
    Route::apiResource('pesans', PesanController::class);
    Route::apiResource('petas', controller: PetaController::class);
    Route::apiResource('histories', controller: HistoryController::class);
    Route::apiResource(name: 'user', controller: UserController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});

