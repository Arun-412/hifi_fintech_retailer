<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\KycController;
use App\Http\Controllers\TransactionalUserController;

Route::get('/verify', function () { return view('auth.OTP'); });

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () { return view('auth.Login'); })->name('login');
    Route::get('/signup', function () { return view('auth.Register'); });
    Route::post('/loggedin', [UserController::class, 'Login'])->name('loggedin');
    Route::post('/register', [UserController::class, 'Register'])->name('Register');
    Route::post('/signin', [UserController::class, 'Signin'])->name('Signin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/coming_soon', function () { return view('coming_soon'); })->name('coming_soon'); 
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/logout', [UserController::class, 'Logout'])->name('logout');

    Route::get('/profile', function () { return view('profile'); })->name('profile');
    Route::get('/settings', function () { return view('settings'); })->name('settings');
    Route::get('/support', function () { return view('support'); })->name('support');

    Route::group(['prefix' => 'payout'], function () {
        Route::get('/', function () { return view('payout.login'); })->name('payout_login');
        Route::get('/dashboard', function () { return view('payout.dashboard'); })->name('payout_dashboard');
        Route::post('/activate_payout', [PayoutController::class, 'activate_payout'])->name('activate_payout');
        Route::post('/payout_user', [PayoutController::class, 'payout_user'])->name('payout_user');
        Route::post('/add_account', [PayoutController::class, 'add_account'])->name('add_account');
        Route::get('/bank_list', [PayoutController::class, 'bank_list'])->name('bank_list');
        Route::get('/login', [TransactionalUserController::class, 'user_login'])->name('transaction_user_login');
    });

    Route::group(['prefix' => 'report'], function () {
        Route::get('/', function () { return view('report'); })->name('report'); 
        Route::get('/search', [ReportController::class, 'search_report'])->name('search_report');
    });

    Route::group(['prefix' => 'print'], function () {   
        Route::get('/transaction', function () { return view('print.transaction'); })->name('print_transaction');
    }); 
 
    Route::group(['prefix' => 'money_transfer'], function () {   
        Route::get('/', function () { return view('money_transfer.login'); })->name('money_transfer_login');
    }); 

    Route::group(['prefix' => 'aeps'], function () {   
        Route::get('/', function () { return view('aeps.login'); })->name('aeps_login');
    }); 

    Route::group(['prefix' => 'bill_payments'], function () {   
        Route::get('/bbps', function () { return view('bill_payments.bbps'); })->name('bill_payments_bbps');
        Route::get('/cms', function () { return view('bill_payments.cms'); })->name('bill_payments_cms');
    });

    Route::group(['prefix' => 'payment_link'], function () {   
        Route::get('/', function () { return view('payment_link.login'); })->name('payment_link_login');
    }); 

    Route::group(['prefix' => 'wallet_topup'], function () {   
        Route::get('/', function () { return view('wallet_topup.dashboard'); })->name('wallet_topup_dashboard');
    }); 

    Route::group(['prefix' => 'kyc'], function () {   
        Route::get('/', function () { return view('kyc'); })->name('kyc');
        Route::post('/kyc_pan_address_verify', [KycController::class, 'kyc_pan_address_verify'])->name('address_pan_verify');
    }); 
});

