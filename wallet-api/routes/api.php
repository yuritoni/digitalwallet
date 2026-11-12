<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\TopupController;
use App\Http\Controllers\Api\TransferController;
use App\Http\Controllers\Api\TransactionController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/wallet', [WalletController::class, 'show']);
    Route::post('/topup', [TopupController::class, 'store']);
    Route::post('/transfer', [TransferController::class, 'store']);
    Route::get('/transactions', [TransactionController::class, 'index']);
});
