<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('user/profile', [UserController::class, 'show'])->name('user.profile');
    Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::put('user/password/{user}', [UserController::class, 'updatePassword'])->name('user.update-password');
});

Route::get('/notifications/{id}/read', [NotificationController::class, 'update'])->middleware(['auth', 'verified'])->name('notifications.read');

require __DIR__.'/editor.php';

require __DIR__.'/admin.php';

Route::get('expired', fn () => inertia('Errors/Expired'))->name('expired');

require __DIR__.'/auth.php';
