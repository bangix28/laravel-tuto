<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


/**
 * Route de l'index.
 */
Route::get('/', [IndexController::class, 'show'])->name('index');
/**
 * Groups Post qui gère les différentes routes liées au contrôleur post
 */
Route::prefix('/post')->group(function () {
    Route::get('/{post}/show', [PostController::class, 'show'])->name('post.show');

    /**
     * Ce middleware permet de mettre une restriction aux gens qui ne sont pas connectés.
     */
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/create', [PostController::class, 'store'])->name('post.store');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('post.edit')->can('update','post');
        Route::patch('/{post}/edit', [PostController::class, 'update'])->name('post.update')->can('update','post');
        Route::delete('/{post}/delete', [PostController::class, 'destroy'])->name('post.delete')->can('update','post');
    });
});


/**
 * Configuration des routes de la gestion des utilisateurs.
 */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [PostController::class, 'getPostsUser'])->name('0');
});
