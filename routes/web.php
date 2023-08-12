<?php

use App\Http\Controllers\AffectationController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BonEntreController;
use App\Http\Controllers\BonSortieController;
use App\Http\Controllers\DechargeFournisseurController;
use App\Http\Controllers\DechargeStructureController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\FournisseurController;
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
Route::view('/about-us', 'about_us')->name('aboutUs');

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
    Route::get('/employees/{matricule}/edit', [EmployeController::class, 'edit'])->name('employees.edit');
    Route::patch('/employees/{matricule}', [EmployeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{matricule}/delete', [EmployeController::class, 'destroy'])->name('employees.destroy');

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
    Route::get('/materiels/{matricule}/edit', [MaterielController::class, 'edit'])->name('materiels.edit');
    Route::patch('/materiels/{matricule}', [MaterielController::class, 'update'])->name('materiels.update');
    Route::delete('/materiels/{matricule}/delete', [MaterielController::class, 'destroy'])->name('materiels.destroy');

    // Fournisseurs
    Route::get('/fournisseurs', [FournisseurController::class, 'index'])->name('fournisseurs.index');
    Route::get('/fournisseurs/create', [FournisseurController::class, 'create'])->name('fournisseurs.create');
    Route::post('/fournisseurs', [FournisseurController::class, 'store'])->name('fournisseurs.store');
    Route::get('/fournisseurs/{num_fournisseur}/edit', [FournisseurController::class, 'edit'])->name('fournisseurs.edit');
    Route::patch('/fournisseurs/{num_fournisseur}', [FournisseurController::class, 'update'])->name('fournisseurs.update');
    Route::delete('/fournisseurs/{num_fournisseur}/delete', [FournisseurController::class, 'destroy'])->name('fournisseurs.destroy');

    // Affectations
    Route::get('/affectations', [AffectationController::class, 'index'])->name('affectations.index');
    Route::get('/affectations/create', [AffectationController::class, 'create'])->name('affectations.create');
    Route::post('/affectations', [AffectationController::class, 'store'])->name('affectations.store');
    Route::get('/affectations/{code_affectation}/edit', [AffectationController::class, 'edit'])->name('affectations.edit');
    Route::patch('/affectations/{code_affectation}', [AffectationController::class, 'update'])->name('affectations.update');
    Route::delete('/affectations/{code_affectation}/delete', [AffectationController::class, 'destroy'])->name('affectations.destroy');

    // Reparations (Decharges fournisseur)
    Route::get('/reparations', [DechargeFournisseurController::class, 'index'])->name('decharges_fournisseur.index');
    Route::get('/reparations/create', [DechargeFournisseurController::class, 'create'])->name('decharges_fournisseur.create');
    Route::post('/reparations', [DechargeFournisseurController::class, 'store'])->name('decharges_fournisseur.store');
    Route::get('/reparations/{code_decharge}/edit', [DechargeFournisseurController::class, 'edit'])->name('decharges_fournisseur.edit');
    Route::patch('/reparations/{code_decharge}', [DechargeFournisseurController::class, 'update'])->name('decharges_fournisseur.update');
    Route::delete('/reparations/{code_decharge}/delete', [DechargeFournisseurController::class, 'destroy'])->name('decharges_fournisseur.destroy');

    // Reformations (Decharges structure)
    Route::get('/reformations', [DechargeStructureController::class, 'index'])->name('decharges_structure.index');
    Route::get('/reformations/create', [DechargeStructureController::class, 'create'])->name('decharges_structure.create');
    Route::post('/reformations', [DechargeStructureController::class, 'store'])->name('decharges_structure.store');
    Route::get('/reformations/{code_decharge}/edit', [DechargeStructureController::class, 'edit'])->name('decharges_structure.edit');
    Route::patch('/reformations/{code_decharge}', [DechargeStructureController::class, 'update'])->name('decharges_structure.update');
    Route::delete('/reformations/{code_decharge}/delete', [DechargeStructureController::class, 'destroy'])->name('decharges_structure.destroy');

    // Bons entre
    Route::get('/bons-entre', [BonEntreController::class, 'index'])->name('bons_entre.index');
    Route::get('/bons-entre/create', [BonEntreController::class, 'create'])->name('bons_entre.create');
    Route::post('/bons-entre', [BonEntreController::class, 'store'])->name('bons_entre.store');
    Route::get('/bons-entre/{num_be}/edit', [BonEntreController::class, 'edit'])->name('bons_entre.edit');
    Route::patch('/bons-entre/{num_be}', [BonEntreController::class, 'update'])->name('bons_entre.update');
    Route::delete('/bons-entre/{num_be}/delete', [BonEntreController::class, 'destroy'])->name('bons_entre.destroy');

    // Bons sortie
    Route::get('/bons-sortie', [BonSortieController::class, 'index'])->name('bons_sortie.index');
    Route::get('/bons-sortie/create', [BonSortieController::class, 'create'])->name('bons_sortie.create');
    Route::post('/bons-sortie', [BonSortieController::class, 'store'])->name('bons_sortie.store');
    Route::get('/bons-sortie/{num_bs}/edit', [BonSortieController::class, 'edit'])->name('bons_sortie.edit');
    Route::patch('/bons-sortie/{num_bs}', [BonSortieController::class, 'update'])->name('bons_sortie.update');
    Route::delete('/bons-sortie/{num_bs}/delete', [BonSortieController::class, 'destroy'])->name('bons_sortie.destroy');

});
