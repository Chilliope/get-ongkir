<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ShippingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/province', ProvinceController::class);
Route::get('/city/{id}', [CityController::class, 'index']);
Route::post('/calculate-cost', [ShippingController::class, 'calculateCost']);