<?php

use App\Http\Controllers\ModalityController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/modalidades', [ModalityController::class, 'index'])->name('modalities.index');
    Route::post('/modalidades', [ModalityController::class, 'store'])->name('modality.store');
    Route::delete('/modalidade/{id}', [ModalityController::class, 'destroy'])->name('modality.destroy');
    Route::put('/modalidade', [ModalityController::class, 'update'])->name('modality.update');
});
