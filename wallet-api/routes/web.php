<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TopupController;
use App\Http\Controllers\Admin\TransactionController;

Route::get('/', fn () => redirect()->route('admin.login'));
Route::get('/home', fn () => redirect()->route('admin.dashboard'));

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('admin.guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    });

    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/topups', [TopupController::class, 'index'])->name('topups.index');
        Route::post('/topups/{topup}/approve', [TopupController::class, 'approve'])->name('topups.approve');
        Route::post('/topups/{topup}/reject', [TopupController::class, 'reject'])->name('topups.reject');
        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
