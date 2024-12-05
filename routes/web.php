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
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{yr?}', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard-data/data-per-country', [DashboardController::class, 'get_data_per_country'])->name('dashboard.data');
    Route::get('/dashboard-regional', [DashboardController::class, 'dashboard_regional'])->name('dashboard.regional');
    Route::get('/dashboard-data/data-per-region', [DashboardController::class, 'get_data_per_region'])->name('dashboard.data.region');

    // Profile Routing
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Settings Routing
    Route::get('/settings-accomplishments', [SettingsController::class, 'accomplishments'])->name('settings.accomplishments');
    Route::get('/settings-events', [SettingsController::class, 'events'])->name('settings.events');
    Route::get('/settings-translations', [SettingsController::class, 'translations'])->name('settings.translations');

    Route::post('/settings-upload-accomplishments', [SettingsController::class, 'uploadAccomplishments'])->name('settings.upload-accomplishments');
    Route::post('/settings-upload-events', [SettingsController::class, 'uploadEvents'])->name('settings.upload-events');
    Route::post('/settings-upload-translations', [SettingsController::class, 'uploadTranslations'])->name('settings.upload-translations');

    Route::post('/settings-store-accomplishments', [SettingsController::class, 'storeAccomplishments'])->name('settings.store-accomplishments');
    Route::post('/settings-store-events', [SettingsController::class, 'storeEvents'])->name('settings.store-events');
    Route::post('/settings-store-translations', [SettingsController::class, 'storeTranslations'])->name('settings.store-translations');

    // Reports Routing
    Route::get('/reports-accomplishments', [ReportsController::class, 'accomplishments'])->name('reports.accomplishments');
    Route::get('/reports-events', [ReportsController::class, 'events'])->name('reports.events');
    Route::get('/reports-translations', [ReportsController::class, 'translations'])->name('reports.translations');
    // Route::get('/reports/statistcs', [ReportsController::class, 'statsLoad'])->name('reports.statistcs');
});

require __DIR__.'/auth.php';

