<?php

use App\Http\Controllers\MediaController;
use App\Livewire\PublicUserProfile;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get("user", PublicUserProfile::class);
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get("media", [MediaController::class, 'serve'])->name('private-file');
require __DIR__ . '/auth.php';
