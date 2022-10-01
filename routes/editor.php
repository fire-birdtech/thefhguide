<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ProjectController;
use App\Models\Assignment;
use App\Models\Draft;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'verified'],
    'prefix' => 'editor',
    'as' => 'editor.'
], function () {
    Route::get('dashboard', fn () => inertia('Editor/Dashboard', [
        'assignments' => Assignment::where([
            ['user_id', auth()->user()->id],
            ['status', '!=', 'published']
        ])->with('assignable')->get(),
        'drafts' => Draft::where([
            ['user_id', auth()->user()->id],
            ['publish_date', null]
        ])->get()
    ]))->name('dashboard');
    Route::get('content', [ContentController::class, 'index'])->name('content.index');
    Route::resource('collections', CollectionController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('goals', GoalController::class)->except(['index']);
    Route::resource('choices', ChoiceController::class)->except(['index']);
    Route::get('assignment/{assignment}', [AssignmentController::class, 'show'])->name('assignments.show');
    Route::resource('drafts', DraftController::class);
    Route::put('drafts/{draft}/publish', [DraftController::class, 'publish'])->name('drafts.publish');
    Route::post('drafts/{draft}/publish', [DraftController::class, 'notify'])->name('drafts.notify');
});