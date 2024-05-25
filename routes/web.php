<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

// route landing page
Route::get('/', [ProjectController::class, 'landingPage'])->name('landingPage');

// 404 content
Route::fallback(function () {
    return view('404');
});

// route projects
Route::get('/projects', [ProjectController::class, 'projects'])->name('projects');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('project.show');

// route login logout
Route::get('/login', [AuthController::class, 'index'])->name('auth');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// route admin + CRUD project
Route::middleware([Authenticate::class])->group(function () {
    Route::get('/admin', [ProjectController::class, 'admin'])->name('admin');
    Route::get('/admin/projects', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/admin/projects', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/admin/projects/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::patch('/admin/projects/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/admin/projects/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
