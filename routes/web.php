<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware('auth:web')->get('/home', [HomeController::class, 'index']);
Route::middleware('auth:web')->get('/', [HomeController::class, 'index']);

Route::post('sanctum/token', [LoginController::class, 'tokenAuthentication']);
