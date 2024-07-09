<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;

Route::get('/', [SuratController::class, 'index'])->name('surats.index');

Route::resource('surats', SuratController::class);

Route::resource('kategoris', KategoriController::class);

Route::get('/about', function () {
    return view('about');
})->name('about');
