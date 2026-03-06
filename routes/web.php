<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TrackerController;
use App\Http\Controllers\UserDataAccessController;
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

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/tracker', [DashboardController::class, 'onlineTracker'])->name('dashboard');
    Route::get('/tracker/project/{project}', [TrackerController::class, 'show'])->name('tracker.project');
    Route::post('/tracker', [TrackerController::class, 'store'])->name('tracker.store');
    Route::get('groups', [GroupController::class, 'index'])->name('groups');
    Route::post('groups/create', [GroupController::class, 'store'])->name('groups.store');
    Route::get('groups/{group}', [GroupController::class, 'show'])->name('groups.show');
    Route::put('groups/{group}', [GroupController::class, 'update'])->name('groups.update');
    Route::get('reports', [ReportsController::class, 'index'])->name('reports');
    Route::get('settings/profile', [SettingsController::class, 'profile'])->name('settings.profile');
    Route::put('settings/profile/{user}', [SettingsController::class, 'updateProfile'])->name('settings.update-profile');
    Route::get('settings/security', [SettingsController::class, 'security'])->name('settings.security');
    Route::put('settings/password/{user}', [SettingsController::class, 'updatePassword'])->name('settings.update-password');
    Route::get('settings/account', [SettingsController::class, 'account'])->name('settings.account');
    Route::delete('settings/account/{user}', [SettingsController::class, 'deleteAccount'])->name('settings.delete-account');
    Route::post('user-data-access', [UserDataAccessController::class, 'store'])->name('user-data-access.store');
    Route::put('user-data-access/approve', [UserDataAccessController::class, 'update'])->name('user-data-access.update');
});

Route::get('/notifications/{id}/read', [NotificationController::class, 'update'])->middleware(['auth', 'verified'])->name('notifications.read');

require __DIR__.'/editor.php';

require __DIR__.'/admin.php';

Route::get('expired', fn () => inertia('Errors/Expired'))->name('expired');

require __DIR__.'/auth.php';

Route::get('test', function () {
    return inertia('Pages/Test');
});

Route::get('{page}', PageController::class)->where('page', '.*')->name('pages.show');
