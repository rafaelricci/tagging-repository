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
    'index', 'show', 'store', 'destroy'
]);

Auth::routes();
