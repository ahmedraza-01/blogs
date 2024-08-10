<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\MediumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\AdminMiddleware;
use App\Models\User;

Route::get('/', [PostController::class, 'home'])->name('posts.home');
Route::get('/medium-posts', [MediumController::class, 'index']);
Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/form', [FormController::class, 'index'])->name('front.form');
    Route::get('/tiny', [FormController::class, 'tiny'])->name('front.tiny');

    
    Route::resource('posts', PostController::class);
    Route::resource('users', UserController::class)->middleware(AdminMiddleware::class);
});

require __DIR__.'/auth.php';