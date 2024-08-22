<?php

use App\Http\Controllers\EstimateController;
use App\Http\Controllers\MatrixController;
use App\Http\Controllers\PartsController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\WorkController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Todos
    Route::prefix('todos')->group(function () {
        Route::get('/', [TodosController::class, 'index'])->name('todos.index');
        Route::get('{id}', [TodosController::class, 'show'])->name('todos.show');
        Route::patch('{todo}/start-timer', [TodosController::class, 'startTimer'])->name('todos.startTimer');
        Route::patch('{todo}/stop-timer', [TodosController::class, 'stopTimer'])->name('todos.stopTimer');
    }); // Tasks
    Route::resource('tasks', TaskController::class)->except(['update']);
    Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

// Matrix, Prices, Parts
    Route::resource('matrix', MatrixController::class);
    Route::resource('prices', PriceController::class);
    Route::resource('parts', PartsController::class);

// routes/web.php

// Works Routes
    Route::prefix('works')->group(function () {
        Route::get('/', [WorkController::class, 'index'])->name('works.index');
        Route::get('/create', [WorkController::class, 'create'])->name('works.create');
        Route::post('/', [WorkController::class, 'store'])->name('works.store');
        Route::post('/assign-technician/{id}', [WorkController::class, 'assignTechnician'])->name('assign.technician');
    });

// Estimates
    Route::prefix('estimates')->group(function () {
        Route::get('create', [EstimateController::class, 'create'])->name('estimate.create');
        Route::get('edit/{id}', [EstimateController::class, 'edit'])->name('estimate.edit');
    });

    // Fetch vehicles by customer
    Route::get('/get-vehicles', [WorkController::class, 'getVehiclesByCustomer']);

});
