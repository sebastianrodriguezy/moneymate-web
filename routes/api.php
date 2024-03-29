<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ConfigurationController;
use App\Http\Controllers\api\TranslationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MovementsController;
use App\Http\Controllers\PersonsController;

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
  Route::post('/movement', [MovementsController::class, 'newMovement']);
  Route::post('/category', [CategoriesController::class, 'newCategory']);
  Route::post('/person', [PersonsController::class, 'newPerson']);

  Route::get('/movements', [MovementsController::class, 'getMovements']);
  Route::get('/categories', [CategoriesController::class, 'categories']);
  Route::get('/persons', [PersonsController::class, 'persons']);
  Route::post('/translate', [TranslationController::class, 'translate']);

  Route::get('/movements/get_totals', [MovementsController::class, 'getTotals']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
