<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PayoutController;

Route::get('/verify', function () { return view('auth.OTP'); });

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () { return view('auth.Login'); })->name('login');
    Route::get('/signup', function () { return view('auth.Register'); });
    Route::post('/loggedin', [UserController::class, 'Login'])->name('loggedin');
    Route::post('/register', [UserController::class, 'Register'])->name('Register');
    Route::post('/signin', [UserController::class, 'Signin'])->name('Signin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/logout', [UserController::class, 'Logout'])->name('logout');

    Route::get('/profile', function () { return view('profile'); })->name('profile');
    Route::get('/settings', function () { return view('settings'); })->name('settings');
    Route::get('/kyc', function () { return view('kyc'); })->name('kyc');
    Route::get('/support', function () { return view('support'); })->name('support');

    Route::group(['prefix' => 'payout'], function () {
        Route::get('/login', function () { return view('payout.login'); })->name('payout_login');
        Route::get('/dashboard', function () { return view('payout.dashboard'); })->name('payout_dashboard');
        Route::post('/payout_user', [PayoutController::class, 'payout_user'])->name('payout_user');
        Route::post('/add_account', [PayoutController::class, 'add_account'])->name('add_account');
    });

    Route::get('/report', function () { return view('report'); })->name('report');
    Route::post('/search_report', [ReportController::class, 'search_report'])->name('search_report');
});

