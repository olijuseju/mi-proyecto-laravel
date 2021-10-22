<?php

namespace App\Http\Controllers;

use App\Http\Logica\LogicaNegocio;
use App\Models\Sensore;
use Illuminate\Http\Request;
use App\Http\Logica\LogicaSensor;

/**
 * @author Jose Julio Peñaranda
 * 2021-10-14
 */

/**
 * Este controlador se encarga de los sensores
 * Es llamado por el archivo api.php para establecer comunicacion con la logica
 * Sus metodos permiten guardar, eliminar y recuperar sensores
 */


class SensorController extends Controller
{
    /**
     * Esta funcion se encarga de obtener todos los sensores
     * @return String devuelve la respuesta REST
     */
    public function index(){
        $logica = new LogicaNegocio();
        return $logica->obtenerTodosLosSensores();
    }

    /**
     * Esta funcion se encarga de guardar un sensor
     * @return String devuelve la respuesta REST
     */
    public  function store(Request $request){
        $name = $request->name;
        $description = $request->description;
        $model = $request->model;
        $logica = new LogicaNegocio();
        return $logica->guardarSensor($name, $model, $description);
    }


/*    public function update(Request $request){
        $name = $request->name;
        $description = $request->description;
        $model = $request->model;
        $logica = new LogicaSensor();
        return $logica->guardarSensor($name, $model, $description);
    }*/

    /**
     * Esta funcion se encarga de obtener un sensor por su id
     * @return String devuelve la respuesta REST
     */
    public  function show(int $id){

        $logica = new LogicaNegocio();
        return $logica->obtenerSensorConId($id);
    }

    /**
     * Esta funcion se encarga de eliminar un sensor por su id
     * @return String devuelve la respuesta REST
     */
    public function delete(Request $request)
    {
        $logica = new LogicaNegocio();
        return $logica->eliminarSensor($request->id);
    }
}
