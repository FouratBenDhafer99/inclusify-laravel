<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

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

Route::post('jobs', [JobApiController::class, 'store']);

Route::get('jobs', [JobApiController::class, 'index']);

Route::get('jobs/{id}', [JobApiController::class, 'show']);

Route::put('jobs/{id}', [JobApiController::class, 'update']);

Route::delete('jobs/{id}', [JobApiController::class, 'destroy']);
