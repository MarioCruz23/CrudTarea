<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('get-usuarios', [\App\Http\Controllers\UserController::class, 'getAll'])->name('api-getAll');
    Route::put('save-usuarios', [\App\Http\Controllers\UserController::class, 'saveusuarios'])->name('api-saveusuario');
    Route::delete('delete-usuarios/{id}', [\App\Http\Controllers\UserController::class, 'deleteusuarios'])->name('api-deleteusuario');
    });
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
