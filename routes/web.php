<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentoController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::get('usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
Route::get('usuarios/edit/{user}', [UserController::class, 'edit'])->name('usuarios.edit');

Route::get('documentos', [DocumentoController::class, 'index'])->name('documentos.index');
Route::get('documentos/create', [DocumentoController::class, 'create'])->name('documentos.create');
Route::post('documentos', [DocumentoController::class, 'store'])->name('documentos.store');
Route::get('documentos/{documento}/edit', [DocumentoController::class, 'edit'])->name('documentos.edit');
Route::put('documentos/{documento}', [DocumentoController::class, 'update'])->name('documentos.update');
Route::delete('documento/{documento}', [DocumentoController::class, 'destroy'])->name('documentos.destroy');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
