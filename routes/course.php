<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/cursos', [CourseController::class, 'index'])->name('courses.index');
    Route::post('/cursos', [CourseController::class, 'store'])->name('course.store');
    Route::delete('/curso/{id}', [CourseController::class, 'destroy'])->name('course.destroy');
    Route::put('/curso', [CourseController::class, 'update'])->name('course.update');
});
