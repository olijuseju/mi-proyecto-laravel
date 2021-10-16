<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LecturasController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estas
| RouteServiceProvider carga las rutas dentro de un grupo que
| contiene el grupo de middleware "web".
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lecturas', [LecturasController::class, 'index']);

/*Route::post('lecturas', [LecturaController::class, 'store']);*/

