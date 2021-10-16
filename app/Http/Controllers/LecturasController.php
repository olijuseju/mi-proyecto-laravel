<?php

namespace App\Http\Controllers;

use App\Http\Logica\LogicaLectura;
use Illuminate\Http\Request;


/**
 * Este controlador se encarga de la comunicacion con el frontend y las lecturas
 * Es llamado por el archivo web.php para establecer comunicacion con la logica
 * Sus metodos permiten mostrar las lecturas en la pagina web en el archivo lecturas.blade.php
 */

class LecturasController extends Controller
{
    public function index(){
        $logicaLecturas = new LogicaLectura();
        $lecturas = $logicaLecturas->obtenerTodasLasMediciones();
        return view('lecturas',compact('lecturas'));
    }
}