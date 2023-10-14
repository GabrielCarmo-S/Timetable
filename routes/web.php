<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonTeacherController;
use App\Http\Controllers\ClassMController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');


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

Route::prefix('professores')->group(function () {
    Route::get('/listar', [TeacherController::class, 'get'])->name('professores.get');
    Route::get('{id}/detalhar', [TeacherController::class, 'getTeacherById'])->name('professores.getTeacherById');
    Route::post('/incluir', [TeacherController::class, 'create'])->name('professores.create');
    Route::put('/alterar', [TeacherController::class, 'update'])->name('professores.update');
    Route::delete('/excluir', [TeacherController::class, 'delete'])->name('professores.delete');
});

Route::prefix('modulos')->group(function () {
    Route::get('/listar', [ModuleController::class, 'get'])->name('modulos.get');
    Route::get('{id}/detalhar', [ModuleController::class, 'getModuleById'])->name('modulos.getModuleById');
    Route::post('/incluir', [ModuleController::class, 'create'])->name('modulos.create');
    Route::put('/alterar', [ModuleController::class, 'update'])->name('modulos.update');
    Route::delete('/excluir', [ModuleController::class, 'delete'])->name('modulos.delete');
});

Route::prefix('licoes')->group(function () {
    Route::get('/listar', [LessonController::class, 'get'])->name('licoes.get');
    Route::get('{id}/detalhar', [LessonController::class, 'getLessonById'])->name('licoes.getLessonById');
    Route::post('/incluir', [LessonController::class, 'create'])->name('licoes.create');
    Route::put('/alterar', [LessonController::class, 'update'])->name('licoes.update');
    Route::delete('/excluir', [LessonController::class, 'delete'])->name('licoes.delete');
});

Route::prefix('licoes_professores')->group(function () {
    Route::get('/listar', [LessonTeacherController::class, 'get'])->name('licoes_professores.get');
    Route::get('{id}/detalhar', [LessonTeacherController::class, 'getLessonTeacherById'])->name('licoes_professores.getLessonTeacherById');
    Route::post('/incluir', [LessonTeacherController::class, 'create'])->name('licoes_professores.create');
    Route::put('/alterar', [LessonTeacherController::class, 'update'])->name('licoes_professores.update');
    Route::delete('/excluir', [LessonTeacherController::class, 'delete'])->name('licoes_professores.delete');
});

Route::prefix('classes')->group(function () {
    Route::get('/listar', [ClassMController::class, 'get'])->name('classes.get');
    Route::get('{id}/detalhar', [ClassMController::class, 'getLessonTeacherById'])->name('classes.getClassMById');
    Route::post('/incluir', [ClassMController::class, 'create'])->name('classes.create');
    Route::put('/alterar', [ClassMController::class, 'update'])->name('classes.update');
    Route::delete('/excluir', [ClassMController::class, 'delete'])->name('classes.delete');
});
