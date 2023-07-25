<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\StructureController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome')->name('welcome');

Route::view('/login', 'login');
Route::post('/login', [AgentController::class, 'login'])->name('login');

Route::middleware('auth')->group(function() {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::post('/logout', [AgentController::class, 'logout'])->name('logout');

    // Agents
    Route::get('/agents', [AgentController::class, 'index'])->name('agents.index');
    Route::get('/agents/create', [AgentController::class, 'create'])->name('agents.create');
    Route::post('/agents', [AgentController::class, 'store'])->name('agents.store');
    Route::get('/agents/{matricule}/edit', [AgentController::class, 'edit'])->name('agents.edit');
    Route::patch('/agents/{matricule}', [AgentController::class, 'update'])->name('agents.update');
    Route::delete('/agents/{matricule}/delete', [AgentController::class, 'destroy'])->name('agents.destroy');

    // Employees
    Route::get('/employees', [EmployeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{num_employe}/edit', [EmployeController::class, 'edit'])->name('employees.edit');
    Route::patch('/employees/{num_employe}', [EmployeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{num_employe}/delete', [EmployeController::class, 'destroy'])->name('employees.destroy');

    // Structures
    Route::get('/structures', [StructureController::class, 'index'])->name('structures.index');
    Route::get('/structures/create', [StructureController::class, 'create'])->name('structures.create');
    Route::post('/structures', [StructureController::class, 'store'])->name('structures.store');
    Route::get('/structures/{num_structure}/edit', [StructureController::class, 'edit'])->name('structures.edit');
    Route::patch('/structures/{num_structure}', [StructureController::class, 'update'])->name('structures.update');
    Route::delete('/structures/{num_structure}/delete', [StructureController::class, 'destroy'])->name('structures.destroy');

    // Materiels
    Route::get('/materiels', [MaterielController::class, 'index'])->name('materiels.index');
    Route::get('/materiels/create', [MaterielController::class, 'create'])->name('materiels.create');
    Route::post('/materiels', [MaterielController::class, 'store'])->name('materiels.store');
    Route::get('/materiels/{num_materiel}/edit', [MaterielController::class, 'edit'])->name('materiels.edit');
    Route::patch('/materiels/{num_materiel}', [MaterielController::class, 'update'])->name('materiels.update');
    Route::delete('/materiels/{num_materiel}/delete', [MaterielController::class, 'destroy'])->name('materiels.destroy');

});
