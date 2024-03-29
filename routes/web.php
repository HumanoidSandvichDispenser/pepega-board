<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/', 'home')
    ->name('home');

Route::view('/post/{id}', 'viewpost')
    ->name('viewpost');

Route::get('/@{username}', [UserController::class, 'show'])
    ->name('user.profile');

Route::view('/thread/{id}', 'viewthread')
    ->name('viewthread');

Route::get('/me', [UserController::class, 'me'])
    ->middleware('auth')
    ->name('user.me');

require __DIR__.'/auth.php';
