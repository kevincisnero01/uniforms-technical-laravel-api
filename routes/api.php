<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GamaController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\SubFamilyController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\IvaController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SizeTypeController;




//=== Auth ===
Route::post('/register', [AuthenticationController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthenticationController::class, 'login'])->name('auth.login');

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');

    //=== Usuarios ===
    Route::apiResource('users', UserController::class);
    Route::get('/clients', [UserController::class, 'clients'])->name('users.clients');

});

//=== Productos ===
Route::apiResource('products', ProductController::class);

//=== Gama ===
Route::apiResource('gamas', GamaController::class);

//=== Region ===
Route::apiResource('regions', RegionController::class);

//=== Familia ===
Route::apiResource('families', FamilyController::class);
Route::apiResource('subfamilies', SubFamilyController::class);

//=== Marcas ===
Route::apiResource('brands', BrandController::class);

//=== Ivas ===
Route::apiResource('ivas', IvaController::class);

//=== Tallas ===
Route::apiResource('sizes', SizeController::class);
Route::apiResource('sizestypes', SizeTypeController::class);
