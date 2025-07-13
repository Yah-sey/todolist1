<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// Page d'accueil et liste des tâches
Route::get('/', [TodoController::class, 'index'])->name('todos.index');
Route::get('/todos', [TodoController::class, 'index']);

// Création de tâche
Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');

// Édition / mise à jour
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');
Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');

// Suppression
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');

// Basculement terminé <=> en cours
Route::put('/todos/{todo}/toggle', [TodoController::class, 'toggle'])->name('todos.toggle');

// Routes pour les invités (non connectés)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Routes pour les utilisateurs connectés
Route::middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
});


