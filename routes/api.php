<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostItController;

Route::prefix('post-its')->group(function () {
    Route::get('/', [App\Http\Controllers\PostItController::class, 'index']);
    Route::post('/', [App\Http\Controllers\PostItController::class, 'store']);
    Route::get('/{id}', [App\Http\Controllers\PostItController::class, 'show']);
    Route::put('/{id}', [App\Http\Controllers\PostItController::class, 'update']);
    Route::delete('/{id}', [App\Http\Controllers\PostItController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


