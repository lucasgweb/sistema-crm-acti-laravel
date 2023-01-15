<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categorias', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/categoria/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('/categoria', [CategoryController::class, 'update'])->name('category.update');
});
