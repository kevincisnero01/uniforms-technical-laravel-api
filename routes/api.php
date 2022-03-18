<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/register', [AuthenticationController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthenticationController::class, 'login'])->name('auth.login');

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');
});

Route::apiResource('users', UserController::class);
Route::get('/clients', [UserController::class, 'clients'])->name('users.clients');
