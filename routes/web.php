<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LecturasController;

/**
 * @author Jose Julio Peñaranda
 * 2021-10-14
 */

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

Route::get('/lecturas', [LecturasController::class, 'index'])->name('lecturas.get');

Route::get('lecturas/{num}', [LecturasController::class, 'show'])->name('lecturas.show');

