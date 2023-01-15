<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/profesores', [TeacherController::class , 'index'])->name('teachers.index');
    Route::post('/profesor', [TeacherController::class, 'store'])->name('teacher.store');
    Route::delete('/profesor/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::put('/profesor', [TeacherController::class, 'update'])->name('teacher.update');
});
