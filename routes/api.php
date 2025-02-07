<?php

use App\Http\Controllers\RessourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('v1/ressources', RessourceController::class);
Route::put('v1/ressources/{id}', [RessourceController::class, 'update']);
