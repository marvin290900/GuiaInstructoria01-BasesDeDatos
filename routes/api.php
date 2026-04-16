<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\AutorController;
use App\Http\Controllers\Api\LibroController;
use App\Http\Controllers\Api\PrestamoController;


Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{user}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::put('/{user}', [UserController::class, 'update']);
    Route::delete('/{user}', [UserController::class, 'destroy']);
});

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{post}', [PostController::class, 'show']);
    Route::post('/', [PostController::class, 'store']);
    Route::put('/{post}', [PostController::class, 'update']);
    Route::delete('/{post}', [PostController::class, 'destroy']);
});

// CRUD CATEGORIAS
Route::prefix('categorias')->group(function () {
    Route::get('/', [CategoriaController::class, 'index']);
    Route::get('/{id}', [CategoriaController::class, 'show']);
    Route::post('/', [CategoriaController::class, 'store']);
    Route::put('/{id}', [CategoriaController::class, 'update']);
    Route::delete('/{id}', [CategoriaController::class, 'destroy']);
});

// CRUD AUTORES
Route::prefix('autores')->group(function () {
    Route::get('/', [AutorController::class, 'index']);
    Route::get('/{id}', [AutorController::class, 'show']);
    Route::post('/', [AutorController::class, 'store']);
    Route::put('/{id}', [AutorController::class, 'update']);
    Route::delete('/{id}', [AutorController::class, 'destroy']);
});

// CRUD LIBROS
Route::prefix('libros')->group(function () {
    Route::get('/', [LibroController::class, 'index']);
    Route::get('/{id}', [LibroController::class, 'show']);
    Route::post('/', [LibroController::class, 'store']);
    Route::put('/{id}', [LibroController::class, 'update']);
    Route::delete('/{id}', [LibroController::class, 'destroy']);
});

// CRUD PRESTAMOS
Route::prefix('prestamos')->group(function () {
    Route::get('/', [PrestamoController::class, 'index']);
    Route::get('/{id}', [PrestamoController::class, 'show']);
    Route::post('/', [PrestamoController::class, 'store']);
    Route::put('/{id}', [PrestamoController::class, 'update']);
    Route::delete('/{id}', [PrestamoController::class, 'destroy']);
});
