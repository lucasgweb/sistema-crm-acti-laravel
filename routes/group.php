<?php

use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/grupos', [GroupController::class, 'index'])->name('groups.index');
    Route::post('/grupo', [GroupController::class, 'store'])->name('group.store');
    Route::delete('/grupo/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
    Route::put('/grupo', [GroupController::class, 'update'])->name('group.update');
});
