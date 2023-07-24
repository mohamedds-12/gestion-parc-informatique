<?php

use App\Http\Controllers\AgentController;
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
Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::view('/login', 'login');
Route::post('/login', [AgentController::class, 'login'])->name('login');
Route::post('/logout', [AgentController::class, 'logout'])->name('logout');

Route::get('/agents', [AgentController::class, 'index'])->name('agents.index');
Route::get('/agents/create', [AgentController::class, 'create'])->name('agents.create');
Route::post('/agents', [AgentController::class, 'store'])->name('agents.store');
Route::get('/agents/{agent}/edit', [AgentController::class, 'edit'])->name('agents.edit');
Route::put('/agents', [AgentController::class, 'update'])->name('agents.update');
Route::delete('/agents/{agent}/delete', [AgentController::class, 'destroy'])->name('agents.destroy');
