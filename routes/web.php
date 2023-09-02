<?php

use App\Http\Controllers\Api\DepositController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserWalletController;
use App\Http\Controllers\WalletController;
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

Route::redirect('/', 'dashboard');
Route::middleware('guest')->group(function () {
    Route::view('/login',                   'auth.login')->name('login');
    Route::view('/register',                'auth.register')->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('wallets',       WalletController::class)->only('index', 'show');
    Route::resource('users',         UserController::class)->only('index', 'show');
    Route::resource('users.wallets', UserWalletController::class)->only('index');
    Route::resource('Transfers',     TransferController::class)->only('index', 'show');
    Route::resource('Deposits',      DepositController::class)->only('index', 'show');

});
