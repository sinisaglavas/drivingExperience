<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
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
});

Route::middleware('auth')->group(function () {
    Route::get('/drivers', [DriverController::class, 'index']);
    Route::view('/driver-creation-form','driverCreationForm');
    Route::post('/create-driver', [DriverController::class, 'create'])->name('createDriver');
    Route::get('/driver-edit-form/{driver}', [DriverController::class, 'driverEditForm'])->name('driverEditForm');
    Route::put('/edit-driver/{driver}', [DriverController::class, 'edit'])->name('editDriver');
    Route::get('/delete-driver/{driver}', [DriverController::class, 'delete'])->name('deleteDriver');

});


require __DIR__.'/auth.php';
