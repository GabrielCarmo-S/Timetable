<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ModulosController;
use App\Http\Controllers\SalasController;
use App\Http\Controllers\AulasController;

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
    Route::get('/listar', [UsuariosController::class, 'get'])->name('usuarios.get');
    Route::get('{id}/detalhar', [UsuariosController::class, 'getUsuarioById'])->name('usuarios.getUsuarioById');
    Route::post('/incluir', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::put('/alterar', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::delete('/excluir', [UsuariosController::class, 'delete'])->name('usuarios.delete');
});

Route::prefix('cursos')->group(function () {
    Route::get('/listar', [CursosController::class, 'get'])->name('cursos.get');
    Route::get('{id}/detalhar', [CursosController::class, 'getCursoById'])->name('cursos.getCursoById');
    Route::post('/incluir', [CursosController::class, 'create'])->name('cursos.create');
    Route::put('/alterar', [CursosController::class, 'update'])->name('cursos.update');
    Route::delete('/excluir', [CursosController::class, 'delete'])->name('cursos.delete');
});

Route::prefix('modulos')->group(function () {
    Route::get('/listar', [ModulosController::class, 'get'])->name('modulos.get');
    Route::get('{id}/detalhar', [ModulosController::class, 'getModuloById'])->name('modulos.getModuloById');
    Route::post('/incluir', [ModulosController::class, 'create'])->name('modulos.create');
    Route::put('/alterar', [ModulosController::class, 'update'])->name('modulos.update');
    Route::delete('/excluir', [ModulosController::class, 'delete'])->name('modulos.delete');
});

Route::prefix('salas')->group(function () {
    Route::get('/listar', [SalasController::class, 'get'])->name('salas.get');
    Route::get('{id}/detalhar', [SalasController::class, 'getSalaById'])->name('salas.getSalaById');
    Route::post('/incluir', [SalasController::class, 'create'])->name('salas.create');
    Route::put('/alterar', [SalasController::class, 'update'])->name('salas.update');
    Route::delete('/excluir', [SalasController::class, 'delete'])->name('salas.delete');
});

Route::prefix('aulas')->group(function () {
    Route::get('/listar', [AulasController::class, 'get'])->name('aulas.get');
    Route::get('{id}/detalhar', [AulasController::class, 'getAulaById'])->name('aulas.getAulaById');
    Route::post('/incluir', [AulasController::class, 'create'])->name('aulas.create');
    Route::put('/alterar', [AulasController::class, 'update'])->name('aulas.update');
    Route::delete('/excluir', [AulasController::class, 'delete'])->name('aulas.delete');
});
