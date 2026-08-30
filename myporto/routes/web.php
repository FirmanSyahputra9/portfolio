<?php

use App\Livewire\Portofolio;
use Illuminate\Support\Facades\Route;
use App\Services\ApiService;
use App\Livewire\PortofolioData;


Route::get('/', function () {
    return view('portofolio');
})->name('home');

Route::get('/myporto', function () {
    return view('test');
})->name('myporto');
