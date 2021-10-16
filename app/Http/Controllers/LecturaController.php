<?php

namespace App\Http\Controllers;

use App\Http\Logica\LogicaLectura;
use App\Models\Lectura;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\String_;
use SebastianBergmann\Environment\Console;


/**
 * Este controlador se encarga de las lecturas
 * Es llamado por el archivo api.php para establecer comunicacion con la logica
 * Sus metodos permiten guardar, eliminar y recuperar mediciones
 */

class LecturaController extends Controller
{

    /**
     * Esta funcion se encarga de obtener todas las mediciones
     * @return String devuelve la respuesta REST
     */
    public function index(){
        $logica = new LogicaLectura();
        return $logica->obtenerTodasLasMediciones();
    }

    /**
     * Esta funcion se encarga de guardar una medicion
     * @return String devuelve la respuesta REST
     */
    public  function store(Request $request){
        $data = $request->data;
        $id_sensor = $request->id_sensor;
        $latitud = $request->latitud;
        $longitud = $request->longitud;
        $logica = new LogicaLectura();
        return $logica->guardarMedicion($data,$id_sensor,$latitud,$longitud);
    }

/*    public function update(Request $request){

        $lectura = Lectura::findOrFail($request->id);

        $lectura->data = $request->data;
        $lectura->time_data = $request->time_data;
        $lectura->id_sensor = $request->id_sensor;

        $lectura->save();
        return response()->json($lectura, 200);
    }*/

    /**
     * Esta funcion se encarga de obtener una medicion por su id
     * @return String devuelve la respuesta REST
     */
    public  function show(int $id){

        $logica = new LogicaLectura();
        return $logica->obtenerLecturaConId($id);
    }

    /**
     * Esta funcion se encarga de eliminar una medicion por su id
     * @return String devuelve la respuesta REST
     */
    public function delete(Request $request)
    {
        $lectura = Lectura::destroy($request->id);
        return response()->json(null, 204);
    }

    /**
     * Esta funcion se encarga de obtener la ultima medicion
     * @return String devuelve la respuesta REST
     */
    public  function latest(int $num){

        $logica = new LogicaLectura();
        return $logica->obtenerUltimasMediciones($num);
    }
}
