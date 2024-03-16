<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User CRUD Functionality
    Route::get('users/restore', [UserController::class, 'deleted'])->name('users.restore.view');
    Route::get('users/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('users/delete/{id}', [UserController::class, 'deletePermanently'])->name('users.delete.permanent');
    Route::get('users/restore-all', [UserController::class, 'restoreAll'])->name('users.restore.all');
    
    Route::resource('users', UserController::class);


});

require __DIR__.'/auth.php';
