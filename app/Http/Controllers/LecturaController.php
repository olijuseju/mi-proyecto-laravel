<?php

namespace App\Http\Controllers;

use App\Http\Logica\LogicaLectura;
use App\Models\Lectura;
use Illuminate\Http\Request;

class LecturaController extends Controller
{

    public function index(){
        $logica = new LogicaLectura();
        return $logica->obtenerTodasLasMediciones();
    }

    public  function store(Request $request){

        $data = $request->data;
        $id_sensor = $request->id_sensor;
        $logica = new LogicaLectura();
        return $logica->guardarMedicion($data,$id_sensor);
    }

/*    public function update(Request $request){

        $lectura = Lectura::findOrFail($request->id);

        $lectura->data = $request->data;
        $lectura->time_data = $request->time_data;
        $lectura->id_sensor = $request->id_sensor;

        $lectura->save();
        return response()->json($lectura, 200);
    }*/

    public  function show(int $id){

        $logica = new LogicaLectura();
        return $logica->obtenerLecturaConId($id);
    }

    public function delete(Request $request)
    {
        $lectura = Lectura::destroy($request->id);
        return response()->json(null, 204);
    }

    public  function latest(int $num){

        $logica = new LogicaLectura();
        return $logica->obtenerUltimasMediciones($num);
    }
}
