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


// Show detail view
Route::get('/surats/{surat}', [SuratController::class, 'show'])->name('surats.show');

// Download the file
Route::get('/surats/{surat}/download', [SuratController::class, 'download'])->name('surats.download');

// Edit surat
Route::get('/surats/{surat}/edit', [SuratController::class, 'edit'])->name('surats.edit');
Route::put('/surats/{surat}', [SuratController::class, 'update'])->name('surats.update');
