<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovementsController;
use App\Http\Controllers\PersonsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('{locale?}')->middleware('localized')->group(function () {

  Route::get('/', function () {
    return redirect('/home');
  });

  Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');

    Route::get('/register', [RegisterController::class, 'show']);

    Route::get('/recovery-password', [ResetPasswordController::class, 'showEmail'])->name('password.request');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showReset'])->name('password.reset');
  });

  Route::middleware('auth')->group(function () {
    Route::get('/home', [DashboardController::class, 'show']);
    Route::get('/movements', [MovementsController::class, 'show']);
    Route::get('/categories', [CategoriesController::class, 'show']);
    Route::get('/persons', [PersonsController::class, 'show']);
  });
});

Route::middleware('guest')->group(function () {
  Route::post('/authenticate', [LoginController::class, 'authenticate']);
  Route::post('/register', [RegisterController::class, 'register']);
  Route::post('/recovery-password', [ResetPasswordController::class, 'sendMail'])->name('password.request');
  Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
});

Route::middleware('auth')->group(function () {
  Route::post('/logout', [LoginController::class, 'logout']);
});
