<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeriaController;
use App\Http\Controllers\EmprendedorController;

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
Route::get('/ferias', [FeriaController::class, 'index'])->name('ferias.index');
Route::get('/ferias/create', [FeriaController::class, 'create'])->name('ferias.create');
Route::post('/ferias', [FeriaController::class, 'store'])->name('ferias.store');
Route::get('/ferias/{feria}/edit', [FeriaController::class, 'edit'])->name('ferias.edit');
Route::put('/ferias/{feria}', [FeriaController::class, 'update'])->name('ferias.update');
Route::delete('/ferias/{feria}', [FeriaController::class, 'destroy'])->name('ferias.destroy');


Route::get('/emprendedores', [EmprendedorController::class, 'index'])->name('emprendedores.index');
Route::get('/emprendedores/create', [EmprendedorController::class, 'create'])->name('emprendedores.create');
Route::post('/emprendedores', [EmprendedorController::class, 'store'])->name('emprendedores.store');
Route::get('/emprendedores/{emprendedor}/edit', [EmprendedorController::class, 'edit'])->name('emprendedores.edit');
Route::put('/emprendedores/{emprendedor}', [EmprendedorController::class, 'update'])->name('emprendedores.update');
Route::delete('/emprendedores/{emprendedor}', [EmprendedorController::class, 'destroy'])->name('emprendedores.destroy');

require __DIR__.'/auth.php';
