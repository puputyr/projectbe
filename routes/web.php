<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; // Call the PostController
use App\Http\Controllers\AuthController; // Call the AuthController

// Route for the home page
Route::get('/', function () {
    return view('welcome');
});

// API routes for posts
// Route::post('/api/posts', [PostController::class, 'create'])->name('posts.create'); // Route to create a post
// Route::get('/api/posts', [PostController::class, 'index'])->name('posts.index'); // Route to get all posts
// Route::get('/api/posts/{id}', [PostController::class, 'show'])->name('posts.show'); // Route to get a post by ID
// Route::put('/api/posts/update/{id}', [PostController::class, 'update'])->name('posts.update'); // Route to update a post by ID
// Route::delete('/api/posts/delete/{id}', [PostController::class, 'delete'])->name('posts.delete'); // Route to delete a post by ID

// Authentication routes
Route::post('/auth/register', [AuthController::class, 'register'])->name('register'); // Route for user registration
Route::post('/auth/login', [AuthController::class, 'login'])->name('login'); // Route for user login
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout'); // Route for user logout with Sanctum middleware



// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/api/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
// });