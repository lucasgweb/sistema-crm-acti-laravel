<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/alumnos', [StudentsController::class, 'index'])->name('students.index');
    Route::post('/alumno', [StudentsController::class, 'store'])->name('student.store');
    Route::delete('/alumno/{id}', [StudentsController::class, 'destroy'])->name('student.destroy');
    Route::put('/alumno', [StudentsController::class, 'update'])->name('student.update');
});
