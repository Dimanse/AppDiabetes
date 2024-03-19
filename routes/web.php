<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'store']);

Route::get('/crear-cuenta',[RegisterController::class, 'index'] )->name('register');
Route::post('/crear-cuenta',[RegisterController::class, 'store'] );

Route::get('/cambiar_password',[PasswordController::class, 'index'] )->name('password');
Route::post('/cambiar_password',[PasswordController::class, 'store'] );

Route::get('/{usuario:paciente}', [PacienteController::class, 'index'])->name('paciente.index');
Route::get('/{usuario:paciente}/registros', [PacienteController::class, 'create'])->name('paciente.create');
Route::post('/{usuario:paciente}/registros/crear', [PacienteController::class, 'store'])->name('paciente.store');
Route::get('/editar/{registro:id}', [PacienteController::class, 'edit'])->name('paciente.editar');
Route::patch('/actualizar/{registro:id}', [PacienteController::class, 'update'])->name('paciente.update');


Route::delete('/borrar/{registro:id}', [PacienteController::class, 'destroy'])->name('paciente.destroy');
