<?php

namespace App\Http\Controllers;

use App\Http\Logica\LogicaLectura;
use App\Http\Logica\LogicaNegocio;
use Illuminate\Http\Request;

/**
 * @author Jose Julio Peñaranda
 * 2021-10-14
 */

/**
 * Este controlador se encarga de la comunicacion con el frontend y las lecturas
 * Es llamado por el archivo web.php para establecer comunicacion con la logica
 * Sus metodos permiten mostrar las lecturas en la pagina web en el archivo lecturas.blade.php
 */

class LecturasController extends Controller
{
    public function index(){
        $logicaLecturas = new LogicaNegocio();
        $lecturas = $logicaLecturas->obtenerTodasLasMediciones();
        return view('lecturas',compact('lecturas'));
    }
}
