<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::post('/leads', [LeadController::class, 'store'])->name('lead.store');
    Route::delete('/lead/{id}', [LeadController::class, 'destroy'])->name('lead.destroy');
    Route::put('/leads', [LeadController::class, 'update'])->name('lead.update');
    Route::put('/lead/update-user', [LeadController::class, 'updateUser'])->name('lead.update-user');
});
