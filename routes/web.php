<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    $stats = [
        'total' => $user->tasks()->count(),
        'pending' => $user->tasks()->pending()->count(),
        'completed' => $user->tasks()->completed()->count(),
    ];
    
    $recentTasks = $user->tasks()->latest()->take(5)->get();

    return view('dashboard', compact('stats', 'recentTasks'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('tasks', \App\Http\Controllers\Tasks\TaskController::class);
    Route::patch('tasks/{task}/toggle', [\App\Http\Controllers\Tasks\TaskController::class, 'toggleStatus'])->name('tasks.toggle');
});

require __DIR__.'/auth.php';
