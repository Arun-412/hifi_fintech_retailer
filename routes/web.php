<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;

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
    Route::post('/logout', [UserController::class, 'Logout'])->name('logout');

    Route::group(['prefix' => 'payout'], function () {
        Route::get('/ekopayout', function () { return view('payout.eko_payout'); })->name('eko_payout');
    });

    Route::get('/report', function () { return view('report'); })->name('report');
    Route::post('/search_report', [ReportController::class, 'search_report'])->name('search_report');
});

