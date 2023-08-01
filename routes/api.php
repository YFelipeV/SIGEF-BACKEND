<?php

use App\Http\Controllers\Administracion\AuthController;
use App\Http\Controllers\Administracion\CentroFormacionController;
use App\Http\Controllers\Administracion\ModulosController;
use App\Http\Controllers\Administracion\RolesController;
use App\Http\Controllers\Administracion\UsuariosController;
use App\Http\Controllers\CategoriasCompetenciasController;
use App\Http\Controllers\CompetenciaController;
use App\Http\Controllers\Senasoft\Aliado;
use App\Http\Controllers\Senasoft\AliadoController;
use App\Http\Controllers\Senasoft\categoriaHabilidadController;
use App\Models\Categorias_competencias;
use App\Models\CentroFormacion;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Auth
Route::get('usuarios', [UsuariosController::class, 'index']);
Route::post('registro', [AuthController::class, 'registro']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('profile', [AuthController::class, 'userProfile']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
Route::get('permisos', [ModulosController::class, 'index2']);


//Roles
Route::get('roles', [RolesController::class, 'index']);
Route::post('roles', [RolesController::class, 'store']);



//modulos
Route::get('modulos/{id}', [ModulosController::class, 'moduloUsuario']);


//centro de formacion
Route::get('centrosformacion', [CentroFormacionController::class, 'index']);


//SENASOFT
Route::get('aliados', [AliadoController::class, 'index']);
Route::get('aliados/{id}', [AliadoController::class, 'show']);
Route::post('aliados/', [AliadoController::class, 'store']);


Route::get('categoria', [categoriaHabilidadController::class, 'index']);
Route::get('categoria/{id}', [categoriaHabilidadController::class, 'show']);
Route::post('categoria', [categoriaHabilidadController::class, 'store']);

//COMPETENCIAS
Route::get('competencias', [CompetenciaController::class, 'index']);
Route::get('competencias/{id}', [CompetenciaController::class, 'show']);
Route::post('competencias', [CompetenciaController::class, 'store']);

//CATEGORIAS-COMPETENCIAS
Route::get('competenciascategorias', [CategoriasCompetenciasController::class, 'index']);
Route::get('competenciascategorias/{id}', [CategoriasCompetenciasController::class, 'show']);
Route::post('competenciascategorias', [CategoriasCompetenciasController::class, 'store']);

