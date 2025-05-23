<?php

use App\Http\Controllers\EmployerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobDashboardController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', [JobController::class, 'index']);

Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth');
Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth');

Route::get('/jobs/dashboard', [JobDashboardController::class, 'dashboard'])->middleware('auth');

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);
Route::get('/employers/{employer:name}', [EmployerController::class, 'jobsByEmployer']);

Route::get('/employers', [EmployerController::class, 'index']);

Route::middleware('guest')->group(function () {
  Route::get('/register', [RegisteredUserController::class, 'create']);
  Route::post('/register', [RegisteredUserController::class, 'store']);
  Route::get('/login', [SessionController::class, 'create'])->name('login');
  Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');
