<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ThreadController;

Route::get('/', [CommentController::class, 'index'])->name('index');
Route::post('/', [CommentController::class, 'store'])->name('store');
Route::get('threads/create', [ThreadController::class, 'create'])->name('thread.create');
Route::post('threads', [ThreadController::class, 'store'])->name('thread.store');