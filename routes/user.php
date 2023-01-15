<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');

    Route::group(['middleware' => ['permission:Administrador']], function () {
        Route::post('/usuarios', [UserController::class, 'store'])->name('user.store');
        Route::delete('/usuario/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::put('/usuarios', [UserController::class, 'update'])->name('user.update');
    });

});
