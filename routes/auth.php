<?php

use App\Http\Controllers\AuthController;
/*
 * |--------------------------------------------------------------------------
 * | Auth Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 * | @see https://laravel.com/docs/12.x/authentication
 * |
 */
// Guest routes
Route::group([
    'middleware' => 'guest',
], function () {
    // Login
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate']);

    // Forgot password
    Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('forgot-password', [AuthController::class, 'sendResetLinkEmail']);

    // Reset password
    Route::get('reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [AuthController::class, 'reset']);
});

// Authenticated routes
Route::group([
    'middleware' => 'auth',
], function () {
    // Register
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'store']);

    // Logout
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // Verify email
    Route::get('email/verify', [AuthController::class, 'verifyEmail'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [AuthController::class, 'verify'])->name('verification.verify');
});
