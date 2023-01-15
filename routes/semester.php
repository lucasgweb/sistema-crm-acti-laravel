<?php

use App\Http\Controllers\SemesterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/semestres', [SemesterController::class, 'index'])->name('semesters.index');
    Route::post('/semestre', [SemesterController::class, 'store'])->name('semester.store');
    Route::delete('/semestre/{id}', [SemesterController::class, 'destroy'])->name('semester.destroy');
    Route::put('/semestre', [SemesterController::class, 'update'])->name('semester.update');
});
