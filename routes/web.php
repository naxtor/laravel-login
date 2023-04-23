<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [AuthController::class, 'login_view'])->name('login_view');
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register_view'])->name('register_view');
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::get('/reset-password', [AuthController::class, 'reset_password_view'])->name('reset_password_view');
Route::post('/reset-password', [UserController::class, 'reset_password'])->name('reset_password');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard_view');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
