<?php
use App\Http\Controllers\AuthController; 
Route::post('/auth/register',
[AuthController::class, 'register'])->name('register'); 
Route::post('/auth/login', [AuthController::class,'login'])
->name('login'); 
Route::post('/auth/logout', [AuthController::class,'logout'])
->middleware('auth:sanctum')->name('logout');