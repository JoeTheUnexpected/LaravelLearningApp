<?php

use App\Http\Controllers\CarsApiController;
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

Route::middleware('shield')->get('/cars', [CarsApiController::class, 'index']);
Route::middleware('shield')->post('/cars', [CarsApiController::class, 'store']);
Route::middleware('shield')->patch('/cars/{car}', [CarsApiController::class, 'update']);
Route::middleware('shield')->delete('/cars/{car}', [CarsApiController::class, 'destroy']);
