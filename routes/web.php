<?php

use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
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
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group([
    'middleware' => ['auth', 'verified'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('dashboard', fn () => inertia('Admin/Dashboard'))->name('dashboard');
    Route::resource('partners', PartnerController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('collections', CollectionController::class);
    Route::resource('goals', GoalController::class)->except(['index']);
    Route::resource('choices', ChoiceController::class)->except(['index']);
});

require __DIR__.'/auth.php';
