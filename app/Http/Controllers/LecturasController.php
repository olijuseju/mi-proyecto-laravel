<?php

namespace App\Http\Controllers;

use App\Http\Logica\LogicaLectura;
use Illuminate\Http\Request;

class LecturasController extends Controller
{
    public function index(){
        $logicaLecturas = new LogicaLectura();
        $lecturas = $logicaLecturas->obtenerTodasLasMediciones();
        return view('lecturas',compact('lecturas'));
    }
}
