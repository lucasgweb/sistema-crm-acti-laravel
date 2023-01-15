<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/matriculas', [RegisterController::class, 'index'])->name('registers.index');
    Route::post('/matricula', [RegisterController::class, 'store'])->name('register.store');
    Route::delete('/matricula/{id}', [RegisterController::class, 'destroy'])->name('register.destroy');
    Route::put('/matricula', [RegisterController::class, 'update'])->name('register.update');
});
