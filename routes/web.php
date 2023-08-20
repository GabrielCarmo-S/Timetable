<?php

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

Route::prefix('users')->group(function () {
    Route::get('/listar', [UserController::class, 'get'])->name('users.get');
    Route::get('{id}/detalhar', [UserController::class, 'getUserById'])->name('users.getUserById');
    Route::post('/incluir', [UserController::class, 'create'])->name('users.create');
    Route::put('/alterar', [UserController::class, 'update'])->name('users.update');
    Route::delete('/excluir', [UserController::class, 'delete'])->name('users.delete');
});
