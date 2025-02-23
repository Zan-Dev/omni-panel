<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    });
});

Route::get('forgot-password', function(){
    return view('auth.forgot-password');
})->name('forgot-password');