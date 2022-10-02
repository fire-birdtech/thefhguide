<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\NotificationController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('invitations/accept', [InvitationController::class, 'accept'])->name('invitations.accept');
    Route::post('invitations/accept', [InvitationController::class, 'process'])->name('invitations.accept');
    Route::post('invitations/register', [InvitationController::class, 'register'])->name('invitations.register');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/notifications/{id}/read', [NotificationController::class, 'update'])->middleware(['auth', 'verified'])->name('notifications.read');

require __DIR__.'/editor.php';

Route::group([
    'middleware' => ['auth', 'verified', 'role:admin|super admin'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('dashboard', fn () => inertia('Admin/Dashboard'))->name('dashboard');
    Route::get('content', [ContentController::class, 'index'])->name('content.index');  
    Route::get('editors', [AdminController::class, 'index'])->name('editors.index');
    Route::get('editors/create', [AdminController::class, 'create'])->name('editors.create');
    Route::get('editors/show/{user}', [AdminController::class, 'show'])->name('editors.show');
    Route::get('editors/edit/{user}', [AdminController::class, 'edit'])->name('editors.edit');
    Route::put('editors/edit/{user}', [AdminController::class, 'update'])->name('editors.update');
    Route::post('editors/invite', [InvitationController::class, 'store'])->name('editors.invite');
    Route::resource('invitations', InvitationController::class);
    Route::post('invitations/resend', [InvitationController::class, 'resend'])->name('invitations.resend');
    Route::get('assignments', [AssignmentController::class, 'index'])->name('assignments.index');
    Route::get('assignments/create', [AssignmentController::class, 'create'])->name('assignments.create');
    Route::post('assignments', [AssignmentController::class, 'store'])->name('assignments.store');
});

Route::get('expired', fn () => inertia('Errors/Expired'))->name('expired');

require __DIR__.'/auth.php';
