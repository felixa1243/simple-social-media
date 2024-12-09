<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;
use App\Livewire\PublicUserProfile;
use App\Livewire\SearchPage;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get("user", PublicUserProfile::class);
Route::get("search", SearchPage::class);
Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get("media", [MediaController::class, 'serve'])->name('private-file');
require __DIR__ . '/auth.php';
