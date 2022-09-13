<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'verified'],
    'prefix' => 'editor',
    'as' => 'editor.'
], function () {
    Route::get('dashboard', fn () => inertia('Editor/Dashboard'))->name('dashboard');
    Route::get('content', [ContentController::class, 'index'])->name('content.index');
    Route::resource('collections', CollectionController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('goals', GoalController::class)->except(['index']);
});