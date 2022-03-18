<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GamaController;



Route::post('/register', [AuthenticationController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthenticationController::class, 'login'])->name('auth.login');

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');
});
//=== Usuarios ===
Route::apiResource('users', UserController::class);
Route::get('/clients', [UserController::class, 'clients'])->name('users.clients');

//=== Productos ===
Route::apiResource('products', ProductController::class);

//=== Gama ===
Route::apiResource('gamas', GamaController::class);
