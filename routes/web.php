<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EmployeeController;




Route::middleware(['auth'])->group(function () {
    Route::get('/empleados', [EmployeeController::class, 'index'])->name('empleados.index');
    Route::get('/empleados/{employee}', [EmployeeController::class, 'show'])->name('empleados.show');
});



Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
