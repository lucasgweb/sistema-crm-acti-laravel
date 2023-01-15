<?php

use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/tipos', [TypeController::class, 'index'])->name('types.index');

    Route::group(['middleware' => ['permission:Administrador']], function () {
        Route::post('/tipos', [TypeController::class, 'store'])->name('type.store');
        Route::delete('/tipo/{id}', [TypeController::class, 'destroy'])->name('type.destroy');
        Route::put('/tipo', [TypeController::class, 'update'])->name('type.update');
    });

});
