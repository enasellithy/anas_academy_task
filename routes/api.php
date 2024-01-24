<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [\App\Http\Controllers\API\Auth\RegisterController::class, 'register']);
Route::post('login', [\App\Http\Controllers\API\Auth\LoginController::class, 'login']);
Route::post('reset_password', [\App\Http\Controllers\API\Auth\LoginController::class, 'reset_password']);
Route::post('updatePassword', [\App\Http\Controllers\API\Auth\LoginController::class,'updatePassword']);

Route::group(['middleware' => 'auth:sanctum'],function () {
    Route::get('logout',[\App\Http\Controllers\API\Auth\ProfileController::class, 'logout']);
    Route::get('updateProfile',[\App\Http\Controllers\API\Auth\ProfileController::class, 'updateProfile']);


    Route::group(['prefix' => 'products'], function (){
        Route::resource('/',\App\Http\Controllers\API\ProductController::class);
        Route::get('getGrategerThan', [\App\Http\Controllers\API\ProductController::class,'getGrategerThan']);
    });
});
