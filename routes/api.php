<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;

use App\Http\Controllers\API\CursoController;
use App\Http\Controllers\API\AnioLectivoController;
use App\Http\Controllers\API\RolController;

use App\Http\Controllers\API\MatriculaController;
use App\Http\Controllers\API\AlumnoController;
use App\Http\Controllers\API\PeriodoController;
use App\Http\Controllers\API\DocenteController;




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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);




Route::get('listAlumnos', [AlumnoController::class, 'register']);
Route::get('listAlumnosUser', [AlumnoController::class, 'ReporteAlumnosUser']);
Route::get('listaAlumnos', [AlumnoController::class, 'index']);
Route::get('listaPeriodos', [PeriodoController::class, 'index']);
Route::post('saveMatricula', [MatriculaController::class, 'store']);
Route::get('showAlumno/{id}', [AlumnoController::class, 'show']);



Route::middleware('auth:api')->group( function () {

    Route::resource('products', ProductController::class);

    Route::resource('cursos', CursoController::class);
    Route::resource('periodos', AnioLectivoController::class);
    Route::resource('rols', RolController::class);
    Route::resource('docente123', DocenteController::class);


    Route::put('actualizaEstado/{id}', [RegisterController::class, 'actualizarEstado']);
    Route::get('listausuarios', [RegisterController::class, 'listUser']);



});
