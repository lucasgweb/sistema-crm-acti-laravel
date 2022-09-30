<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\TypeController;
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
    return Redirect::route('users.index');
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

Route::middleware(['auth'])->group(function () {
    Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categorias', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/categoria/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('/categoria',[CategoryController::class, 'update'])->name('category.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/tipos', [TypeController::class, 'index'])->name('types.index');
    Route::post('/tipos', [TypeController::class, 'store'])->name('type.store');
    Route::delete('/tipo/{id}',[TypeController::class, 'destroy'])->name('type.destroy');
    Route::put('/tipo',[TypeController::class, 'update'])->name('type.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/modalidades', [ModalityController::class, 'index'])->name('modalities.index');
    Route::post('/modalidades', [ModalityController::class, 'store'])->name('modality.store');
    Route::delete('/modalidade/{id}',[ModalityController::class, 'destroy'])->name('modality.destroy');
    Route::put('/modalidade',[ModalityController::class, 'update'])->name('modality.update');
});
