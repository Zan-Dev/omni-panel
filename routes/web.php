<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function(){
        Route::get('auth/google','googleLogin')->name('auth.googleLogin');
        Route::get('auth/google-callback', 'googleAuth')->name('auth.google-callback');
        
        Route::get('/login', 'showLogin')->name('login');
        Route::post('/login', 'login');

        Route::get('/register', 'showRegister')->name('register');
        Route::post('/register', 'register');
    });
});

Route::middleware('auth')->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/logout','logout')->name('logout');
        Route::post('/change-password/{id}', 'changePassword')->name('change-password');
    });    

    Route::get('/dashboard', function(){
        return view('dashboard.index');
    })->name('dashboard');

    Route::get('/profile', function(){
        return view('users.profile');
    })->name('profile');

    Route::get('/data-table', function(){
        return view('table.data-table');
    })->name('table');

    Route::get('/componenet/button', function(){
        return view('components.button');
    })->name('button');

    Route::get('/chart', [ChartController::class, 'index'])->name('chart');
});

Route::get('forgot-password', function(){
    return view('auth.forgot-password');
})->name('forgot-password');