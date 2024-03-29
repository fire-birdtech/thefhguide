<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResourceLinkController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'verified'],
    'prefix' => 'editor',
    'as' => 'editor.',
], function () {
    Route::get('dashboard', [DashboardController::class, 'editor'])->middleware('role:editor')->name('dashboard');
    Route::get('content', [ContentController::class, 'index'])->name('content.index');
    Route::resource('collections', CollectionController::class)->except(['index', 'create']);
    Route::resource('projects', ProjectController::class)->except(['index', 'create']);
    Route::put('projects/{project}/update-project-order', [ProjectController::class, 'updateProjectOrder'])->name('projects.update-order');
    Route::resource('goals', GoalController::class)->except(['index', 'create']);
    Route::put('goals/{goal}/update-goal-order', [GoalController::class, 'updateGoalOrder'])->name('goals.update-order');
    Route::get('goals/{goal}/preview', [GoalController::class, 'preview'])->name('goals.preview');
    Route::resource('choices', ChoiceController::class)->except(['index', 'create']);
    Route::put('choices/{choice}/update-choice-order', [ChoiceController::class, 'updateChoiceOrder'])->name('choices.update-order');
    Route::get('assignment/{assignment}', [AssignmentController::class, 'show'])->name('assignments.show');
    Route::put('assignment/{assignment}', [AssignmentController::class, 'markComplete'])->name('assignments.mark-complete');
    Route::resource('drafts', DraftController::class);
    Route::put('drafts/{draft}/publish', [DraftController::class, 'publish'])->name('drafts.publish');
    Route::post('drafts/{draft}/publish', [DraftController::class, 'notify'])->name('drafts.notify');
    Route::resource('resources', ResourceLinkController::class)->except(['update']);
    Route::put('resources/update', [ResourceLinkController::class, 'update'])->name('resources.update');
    Route::get('media', [MediaController::class, 'index'])->name('media.index');
    Route::get('media/create', [MediaController::class, 'create'])->name('media.create');
    Route::post('media/store', [MediaController::class, 'store'])->name('media.store');
    Route::post('media/{media}/attach', [MediaController::class, 'attach'])->name('media.attach');
    Route::get('pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::get('pages/{page:id}', [PageController::class, 'show'])->name('pages.show');
    Route::post('pages/store', [PageController::class, 'store'])->name('pages.store');
    Route::get('pages/{page:id}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::put('pages/{page:id}', [PageController::class, 'update'])->name('pages.update');
});
