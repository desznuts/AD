<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentsController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\PreventBackHistory;


Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    Route::get('/students', [studentsController::class, 'index'])->name('students.index');
    Route::post('/students/register', [studentsController::class, 'store'])->name('register.student');
    Route::get('/delete/{id}', [studentsController::class, 'delete'])->name('delete.student');
    Route::get('/update/{id}', [studentsController::class, 'updateView'])->name('update.student');
    Route::post('/update/{id}', [studentsController::class, 'update'])->name('update.student.post');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'home']);
Route::get('/student/{id}', [studentsController::class, 'get']);
// Route::get('/students', [studentsController::class, 'index'])->name('students.index');
// Route::post('/students/register', [studentsController::class, 'store'])->name('register.student');
// Route::get('/delete/{id}', [studentsController::class, 'delete'])->name('delete.student');
// Route::get('/update/{id}', [studentsController::class, 'updateView'])->name('update.student');
// Route::post('/update/{id}', [studentsController::class, 'update'])->name('update.student.post');

// Authentication routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
