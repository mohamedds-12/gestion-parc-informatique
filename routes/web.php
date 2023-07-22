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
