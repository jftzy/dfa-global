<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Settings Routing
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings-upload', [SettingsController::class, 'upload'])->name('settings.upload');

    // Reports Routing
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
});

require __DIR__.'/auth.php';
