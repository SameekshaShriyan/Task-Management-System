<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/tasks');
});
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])
    ->name('tasks.complete');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('tasks', TaskController::class);
Route::get('/tasks/fix-status', [TaskController::class, 'fixStatus']);
Route::patch('/tasks/{task}/toggle-status', [TaskController::class, 'toggleStatus'])->name('tasks.toggleStatus');


