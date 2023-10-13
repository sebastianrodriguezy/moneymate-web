<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ConfigurationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/signin', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::put('/update_theme', [ConfigurationController::class, 'updateTheme']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
