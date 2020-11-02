<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\RepositoryController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('tags', TagController::class)->except([
    'show'
]);
Route::resource('repositories', RepositoryController::class)->only([
    'index', 'store'
]);
Route::get('repositories/{id}', [RepositoryController::class, 'show'])->name('repositories.show');
Route::delete('repositories/{repository_id}/{tag_id}/{user_id}', [RepositoryController::class, 'destroy'])->name('repositories.destroy');
Route::get('tags/getTags', [TagController::class, 'getTags'])->name('tags.getTags');
Auth::routes();
