<?php

use App\Http\Controllers\MatrixController;
use App\Http\Controllers\PartsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\WorkController;

use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', [WorkController::class, 'index'])->name('works.index');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/todos', [TodosController::class, 'index'])->name('todos.index');
    Route::get('/todos/{id}', [TodosController::class, 'show'])->name('todos.show');
    Route::patch('/todos/{todo}/start-timer', [TodosController::class, 'startTimer'])->name('todos.startTimer');
    Route::patch('/todos/{todo}/stop-timer', [TodosController::class, 'stopTimer'])->name('todos.stopTimer');

    Route::resource('tasks', TaskController::class)->except(['update']);
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

    Route::resource('matrix', MatrixController::class);
    Route::resource('prices', PriceController::class);
    Route::resource('parts', PartsController::class);
    Route::resource('works', WorkController::class);
});
