<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectController::class, 'index'])->name('home');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');

Route::get('/login', [ProjectController::class, 'index'])->name('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [ProjectController::class, 'admin'])->name('admin');
    Route::post('/admin/project', [ProjectController::class, 'store'])->name('project.store');
    Route::put('/admin/project/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/admin/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
});
