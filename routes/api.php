<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// USER INFO ROUTES

Route::middleware('auth:sanctum')->prefix('/user_info')->group(function(){
    Route::post('/', [\App\Http\Controllers\UserInfo\UserInfoController::class, 'store'])->name('user_info.store');
    Route::get('/{userId}', [\App\Http\Controllers\UserInfo\UserInfoController::class, 'show'])->name('user_info.show');
    Route::delete('/{userId}', [\App\Http\Controllers\UserInfo\UserInfoController::class, 'delete'])->name('user_info.delete');
});


// OBRA SOCIAL ROUTES

Route::middleware('auth:sanctum')->prefix('/obra_social')->group(function(){
    Route::get('/', [\App\Http\Controllers\ObraSocial\ObraSocialController::class, 'index'])->name('obra_social.index');
    Route::get('/{id}', [\App\Http\Controllers\ObraSocial\ObraSocialController::class, 'show'])->name('obra_social.showId');
    Route::post('/store', [\App\Http\Controllers\ObraSocial\ObraSocialController::class, 'store'])->name('obra_social.store');
    Route::put('/{id}', [\App\Http\Controllers\ObraSocial\ObraSocialController::class, 'update'])->name('obra_social.update');
    Route::delete('/{id}', [\App\Http\Controllers\ObraSocial\ObraSocialController::class, 'destroy'])->name('obra_social.destroy');
});
