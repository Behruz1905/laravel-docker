<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('add-post', [PostController::class, 'create'])->name('add-post');
Route::post('store-post', [PostController::class, 'store'])->name('store-post');
Route::get('edit-post', [PostController::class, 'edit'])->name('posts.edit');
Route::delete('delete-post', [PostController::class, 'delete'])->name('posts.destroy');

require __DIR__.'/auth.php';
