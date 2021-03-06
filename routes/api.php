<?php

use App\Http\Controllers\API\LogAggregatorAPIController;
use App\Http\Controllers\Auth\LoginController;
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

Route::middleware('auth:sanctum')->post('/logs', [LogAggregatorAPIController::class, 'create']);
Route::middleware('auth:sanctum')->get('/logs', [LogAggregatorAPIController::class, 'index']);
Route::middleware('auth:sanctum')->get('/logs/search', [LogAggregatorAPIController::class, 'search']);

Route::post('sanctum/token', [LoginController::class, 'tokenAuthentication']);
