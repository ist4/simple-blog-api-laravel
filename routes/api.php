<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return response()->json([
        'message' => 'Hello world',
    ]);
});

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');

Route::controller(\App\Http\Controllers\AdminController::class)->group(function () {
    Route::get('/users', 'users');
});


// Posts
Route::controller(\App\Http\Controllers\PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::get('/posts/{id}', 'show ');
    Route::post('/posts', 'create');
    Route::put('/posts/{id}', 'update');
    Route::delete('/posts/{id}', 'destroy');
});
