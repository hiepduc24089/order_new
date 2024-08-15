<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/error', [LoginController::class, 'error'])->name('error');
Route::get('/password/change', [ChangePasswordController::class, 'show'])->name('password.change');
Route::post('/password/update', [ChangePasswordController::class, 'update'])->name('password.update');
Route::get('/password/forgot', [ForgotPasswordController::class, 'show'])->name('password.forgot');
Route::post('/password/reset', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.reset');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});

Route::post('/packages', [OrderController::class, 'getPackage'])->name('api.package');
