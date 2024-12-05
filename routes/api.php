<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ReportsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// reports routes call
Route::get('statistics', [ReportsController::class, 'statsLoad']);
Route::get('events', [ReportsController::class, 'eventsLoad']);
Route::get('translations', [ReportsController::class, 'translationsLoad']);
