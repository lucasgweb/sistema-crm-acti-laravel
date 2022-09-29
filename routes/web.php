<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
    Route::post('/usuarios', [UserController::class, 'store'])->name('user.store');
    Route::delete('/usuario/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::put('/usuarios',[UserController::class, 'update'])->name('user.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::post('/leads', [LeadController::class, 'store'])->name('lead.store');
    Route::delete('/lead/{id}', [LeadController::class, 'destroy'])->name('lead.destroy');
    Route::put('/leads',[LeadController::class, 'update'])->name('lead.update');
    Route::put('/lead/update-user',[LeadController::class, 'updateUser'])->name('lead.update-user');
});
