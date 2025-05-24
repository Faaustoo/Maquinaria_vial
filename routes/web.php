<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

//vista principal
Route::get('/', function () {return redirect()->route('login');});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// maquinas
Route::middleware('auth')->group(function () {
    Route::get('/machines/search', [MachineController::class, 'search'])->name('machines.search');
    Route::get('/machines', [MachineController::class, 'index'])->name('machines.index');
    Route::get('/machines/create', [MachineController::class, 'create'])->name('machines.create');
    Route::post('/machines', [MachineController::class, 'store'])->name('machines.store');
    Route::get('/machines/{id}/edit', [MachineController::class, 'edit'])->name('machines.edit');
    Route::put('/machines/{id}', [MachineController::class, 'update'])->name('machines.update');
    Route::delete('/machines/{id}', [MachineController::class, 'destroy'])->name('machines.destroy');
});
// mantenimientos
Route::middleware(['auth'])->group(function () {
    Route::get('/maintenances', [MaintenanceController::class, 'index'])->name('maintenances.index');
    Route::get('/maintenances/create', [MaintenanceController::class, 'create'])->name('maintenances.create');
    Route::get('/maintenances/{id}/edit', [MaintenanceController::class, 'edit'])->name('maintenances.edit');
    Route::put('/maintenances/{id}', [MaintenanceController::class, 'update'])->name('maintenances.update');
    Route::delete('/maintenances/{id}', [MaintenanceController::class, 'destroy'])->name('maintenances.destroy');
    Route::post('/maintenances', [MaintenanceController::class, 'store'])->name('maintenances.store');
    Route::get('/maintenances/{machine_id}', [MaintenanceController::class, 'show'])->name('maintenances.show');

});
//obras
Route::middleware(['auth'])->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/finished', [ProjectController::class, 'viewFinished'])->name('projects.viewFinished');
    Route::get('/projects/{project}/finalize', [ProjectController::class, 'showFinalizeForm'])->name('projects.finalize');
    Route::post('/projects/{project}/finish', [ProjectController::class, 'finish'])->name('projects.finish');
    Route::get('/projects/finished/{project}/machines', [ProjectController::class, 'showFinishedMachines'])
    ->name('showFinishedMachines');
});
// asignaciones
Route::middleware(['auth'])->group(function () {
    Route::get('/assignments', [AssignmentController::class, 'index'])->name('assignments.index');
    Route::get('/assignments/create', [AssignmentController::class, 'create'])->name('assignments.create');
    Route::get('/assignments/{id}/edit', [AssignmentController::class, 'edit'])->name('assignments.edit');
    Route::put('/assignments/{id}', [AssignmentController::class, 'update'])->name('assignments.update');
    Route::delete('/assignments/{id}', [AssignmentController::class, 'destroy'])->name('assignments.destroy');
    Route::post('/assignments', [AssignmentController::class, 'store'])->name('assignments.store');
    Route::get('assignments/{id}/finish', [AssignmentController::class, 'finishForm'])->name('assignments.finishForm');
Route::post('assignments/{id}/finish', [AssignmentController::class, 'finish'])->name('assignments.finish');
Route::get('/assignments/finished', [AssignmentController::class, 'viewFinished'])->name('assignments.viewFinished');


});


//perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
