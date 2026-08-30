<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::view('/login', 'pages.auth.login')->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
});
