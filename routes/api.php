<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('locationPoints', \App\Http\Controllers\Api\LocalizationPoint::class);

Route::apiResource('user', \App\Http\Controllers\Api\UserController::class);
Route::apiResource('google-location-points', \App\Http\Controllers\Api\GoogleLocalizationPoint::class);
Route::apiResource('google-location-points', \App\Http\Controllers\Api\GoogleLocalizationPoint::class);
