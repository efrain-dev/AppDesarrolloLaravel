<?php

use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\AuthApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[AuthApiController::class,'register']);
Route::post('/login',[AuthApiController::class,'login']);
Route::get('/user',[AuthApiController::class,'infoUser'])->middleware('auth:sanctum');
Route::post('/logout',[AuthApiController::class,'logout'])->middleware('auth:sanctum');

Route::get('/usuarios', [AuthApiController::class,'index']);
