<?php

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'verified', 'role:admin|super admin'],
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    Route::get('dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    Route::get('editors', [AdminController::class, 'index'])->name('editors.index');
    Route::get('editors/create', [AdminController::class, 'create'])->name('editors.create');
    Route::get('editors/{user}', [AdminController::class, 'show'])->name('editors.show');
    Route::get('editors/{user}/edit', [AdminController::class, 'edit'])->name('editors.edit');
    Route::put('editors/{user}', [AdminController::class, 'update'])->name('editors.update');
    Route::delete('editors/remove/{user}', [AdminController::class, 'remove'])->name('editors.remove');
    Route::post('editors/invite', [InvitationController::class, 'store'])->name('editors.invite');
    Route::resource('invitations', InvitationController::class);
    Route::post('invitations/resend', [InvitationController::class, 'resend'])->name('invitations.resend');
    Route::get('assignments', [AssignmentController::class, 'index'])->name('assignments.index');
    Route::get('assignments/create', [AssignmentController::class, 'create'])->name('assignments.create');
    Route::post('assignments', [AssignmentController::class, 'store'])->name('assignments.store');
    Route::get('assignments/{assignment}/edit', [AssignmentController::class, 'edit'])->name('assignments.edit');
    Route::put('assignments/{assignment}', [AssignmentController::class, 'update'])->name('assignments.update');
});
