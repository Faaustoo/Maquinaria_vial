<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//vista principal
Route::get('/', function () {return redirect()->route('login');});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// maquinas

Route::middleware('auth')->group(function () {
    Route::get('/machines', [MachineController::class, 'index'])->name('machines.index');
    Route::get('/machines/create', [MachineController::class, 'create'])->name('machines.create');
    Route::post('/machines', [MachineController::class, 'store'])->name('machines.store');
    Route::get('/machines/{id}/edit', [MachineController::class, 'edit'])->name('machines.edit');
    Route::put('/machines/{id}', [MachineController::class, 'update'])->name('machines.update');
    Route::delete('/machines/{id}', [MachineController::class, 'destroy'])->name('machines.destroy');
});


// mantenimientos
Route::middleware(['auth'])->group(function () {
    Route::resource('maintenances', MaintenanceController::class);
});

// asignaciones
Route::middleware(['auth'])->group(function () {
    Route::resource('assignments', AssignmentController::class);
});


//perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
