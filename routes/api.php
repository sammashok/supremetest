<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\DepositController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\TransferController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WalletController;
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

Route::post('/login',           [AuthController::class, 'store'])->name('login');
Route::delete('/logout',        [AuthController::class, 'destroy'])->name('logout');
Route::post('/register',        [RegisterController::class, 'store'])->name('register');

Route::middleware('auth')->group(function () {
    Route::apiResource('wallets',  WalletController::class)->only('store', 'update', 'destroy');
    Route::apiResource('users',    UserController::class)->only('store', 'update', 'destroy');
    Route::apiResource('deposits', DepositController::class)->only('store', 'update', 'destroy');
    Route::apiResource('transfers',TransferController::class)->only('store', 'update', 'destroy');
});

