<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 1. ROTTA PUBBLICA (Perché? Tutti devono poter leggere i post)
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 2. GRUPPO PROTETTO (Perché? Solo chi è loggato può modificare i dati)
Route::middleware('auth')->group(function () {
    // Rotte del Profilo (di Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Le tue rotte dei Post "Sotto Chiave"
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

require __DIR__.'/auth.php';
