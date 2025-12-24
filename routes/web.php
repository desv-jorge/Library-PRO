<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // Se estiver autenticado, vai pro Dashboard. Se não, vai pro Login.
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});

// Grupo Protegido (Requer Login)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard (Invokable Controller)
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Rotas de Autores (CRUD)
    Route::resource('authors', AuthorController::class);

    // Rotas de Livros (CRUD)
    Route::resource('books', \App\Http\Controllers\BookController::class);
    
    // Rotas de Perfil (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Inclui as rotas de autenticação (Login, Registro, etc) geradas pelo comando breeze:install
require __DIR__.'/auth.php';