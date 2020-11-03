<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('users/getPerDay', [UserController::class, 'getPerDay'])->name('users.getPerDay');
Route::resource('users', UserController::class)->except([
    'index'
]);
Route::resource('tags', TagController::class)->except([
    'show'
]);
Route::resource('repositories', RepositoryController::class)->only([
    'index', 'store'
]);
Route::get('repositories/search', [RepositoryController::class, 'search'])->name('repositories.search');
Route::get('repositories/{id}', [RepositoryController::class, 'show'])->name('repositories.show');
Route::delete('repositories/{repository_id}/{tag_id}/{user_id}', [RepositoryController::class, 'destroy'])->name('repositories.destroy');
Route::get('tags/getTags', [TagController::class, 'getTags'])->name('tags.getTags');
Auth::routes();
