<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\SensorController;
use \App\Http\Controllers\LecturaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas API para su aplicación. Estas
| RouteServiceProvider carga las rutas dentro de un grupo que
| se le asigna el grupo de middleware "api". ¡Disfruta construyendo tu API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



/**
 * Rutas para las lecturas
 */
Route::get('lecturas',[LecturaController::class, 'index']);

Route::get('lecturas/{id}', [LecturaController::class, 'show']);

Route::get('lecturas/latest/{num}', [LecturaController::class, 'latest']);

Route::post('lecturas', [LecturaController::class, 'store']);

Route::put('lecturas/{id}', [LecturaController::class, 'update']);

Route::delete('lecturas/{id}', [LecturaController::class, 'delete']);


/**
 * Rutas para los sensores
 */
Route::get('sensores',[SensorController::class, 'index']);

Route::get('sensores/{id}', [SensorController::class, 'show']);

Route::post('sensores', [SensorController::class, 'store']);

Route::put('sensores/{id}', [SensorController::class, 'update']);

Route::delete('sensores/{id}', [SensorController::class, 'delete']);



/**
 * Rutas para los usuarios
 */
Route::get('users',[UserController::class, 'index']);

Route::get('users/{id}', [UserController::class, 'show']);

Route::post('users', [UserController::class, 'store']);

Route::put('users/{id}', [UserController::class, 'update']);

Route::delete('users/{id}', [UserController::class, 'delete']);
