<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResourceController;
use App\Models\Assignment;
use App\Models\Draft;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'verified'],
    'prefix' => 'editor',
    'as' => 'editor.'
], function () {
    Route::get('dashboard', [DashboardController::class, 'editor'])->middleware('role:editor')->name('dashboard');
    Route::get('content', [ContentController::class, 'index'])->name('content.index');
    Route::resource('collections', CollectionController::class);
    Route::resource('projects', ProjectController::class);
    Route::put('projects/{project}/update-project-order', [ProjectController::class, 'updateProjectOrder'])->name('projects.update-order');
    Route::resource('goals', GoalController::class)->except(['index']);
    Route::put('goals/{goal}/update-goal-order', [GoalController::class, 'updateGoalOrder'])->name('goals.update-order');
    Route::get('goals/{goal}/preview', [GoalController::class, 'preview'])->name('goals.preview');
    Route::resource('choices', ChoiceController::class)->except(['index']);
    Route::put('choices/{choice}/update-choice-order', [ChoiceController::class, 'updateChoiceOrder'])->name('choices.update-order');
    Route::get('assignment/{assignment}', [AssignmentController::class, 'show'])->name('assignments.show');
    Route::resource('drafts', DraftController::class);
    Route::put('drafts/{draft}/publish', [DraftController::class, 'publish'])->name('drafts.publish');
    Route::post('drafts/{draft}/publish', [DraftController::class, 'notify'])->name('drafts.notify');
    Route::resource('resources', ResourceController::class);
});