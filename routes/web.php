<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Dashboard Routing
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routing
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Settings Routing
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings-upload', [SettingsController::class, 'upload'])->name('settings.upload');
    Route::post('/settings-upload-events', [SettingsController::class, 'uploadEvents'])->name('settings.upload-events');

    // Reports Routing
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
});

require __DIR__.'/auth.php';
