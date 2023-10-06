<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;

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
    Route::post('/authenticate', [LoginController::class, 'authenticate']);

    Route::get('/register', [RegisterController::class, 'show']);
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/recovery-password', [ResetPasswordController::class, 'showEmail'])->name('password.request');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showReset'])->name('password.reset');
    Route::post('/recovery-password', [ResetPasswordController::class, 'sendMail'])->name('password.email');
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
  });

  Route::middleware('auth')->group(function () {
    Route::get('/home', [DashboardController::class, 'show']);
    Route::post('/logout', [LoginController::class, 'logout']);
  });
});
