<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CostumerController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/customers', [CostumerController::class, 'index'])->middleware(['auth', 'verified'])->name('customers.index');
Route::get('/customers/create', [CostumerController::class, 'create'])->middleware(['auth', 'verified'])->name('customers.create');
Route::post('/customers', [CostumerController::class, 'store'])->middleware(['auth', 'verified'])->name('customers.store');
Route::get('/customers/{customer}', [CostumerController::class, 'show'])->middleware(['auth', 'verified'])->name('customers.show');
Route::get('/customers/{customer}/edit', [CostumerController::class, 'edit'])->middleware(['auth', 'verified'])->name('customers.edit');
Route::delete('/customers/{customer}', [CostumerController::class, 'destroy'])->middleware(['auth', 'verified'])->name('customers.destroy');
Route::put('/customers/{customer}', [CostumerController::class, 'update'])->middleware(['auth', 'verified'])->name('customers.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
