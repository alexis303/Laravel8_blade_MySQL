<?php

use App\Http\Controllers\PerritoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', [PerritoController::class, 'inicio'])->name('home');

Route::get('/editar/{id}', [PerritoController::class, 'editar'])->name('perritos.editar');

Route::post('/actualizar', [PerritoController::class, 'actualizar'])->name('perritos.actualizar');


Route::post('/', [PerritoController::class, 'crear'])->name('perritos.crear');

Route::post('/eliminar', [PerritoController::class, 'eliminar'])->name('perritos.eliminar');