<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\FrontController::class,'index']);
Route::get('hello/{param}', [\App\Http\Controllers\FrontController::class,'getData']);

Route::get('custom_auth', [\App\Http\Controllers\FrontController::class,'check_auth'])
    ->middleware(\App\Http\Middleware\CustomMiddleware::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('products',\App\Http\Controllers\ProductController::class);
    Route::resource('strip',\App\Http\Controllers\StripePaymentController::class);
});

Route::middleware(['authenticated'])->group(function () {
    Route::get('/secretPage', function () {
        dd('sdf');
    })->name('secretPage');
});
