<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('usuarios')->group(function () {
    Route::get('/listar', [UserController::class, 'get'])->name('usuarios.get');
    Route::get('{id}/detalhar', [UserController::class, 'getUserById'])->name('usuarios.getUserById');
    Route::post('/incluir', [UserController::class, 'create'])->name('usuarios.create');
    Route::put('/alterar', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('/excluir', [UserController::class, 'delete'])->name('usuarios.delete');
});

Route::prefix('cursos')->group(function () {
    Route::get('/listar', [CourseController::class, 'get'])->name('cursos.get');
    Route::get('{id}/detalhar', [CourseController::class, 'getCourseById'])->name('cursos.getCourseById');
    Route::post('/incluir', [CourseController::class, 'create'])->name('cursos.create');
    Route::put('/alterar', [CourseController::class, 'update'])->name('cursos.update');
    Route::delete('/excluir', [CourseController::class, 'delete'])->name('cursos.delete');
});
