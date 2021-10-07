<?php

namespace App\Http\Controllers;

use App\Models\Sensore;
use Illuminate\Http\Request;
use App\Http\Logica\LogicaSensor;


class SensorController extends Controller
{
    public function index(){
        $logica = new LogicaSensor();
        return $logica->obtenerTodosLosSensores();
    }

    public  function store(Request $request){
        $name = $request->name;
        $description = $request->description;
        $model = $request->model;
        $logica = new LogicaSensor();
        return $logica->guardarSensor($name, $model, $description);
    }

    public function update(Request $request){
        $name = $request->name;
        $description = $request->description;
        $model = $request->model;
        $logica = new LogicaSensor();
        return $logica->guardarSensor($name, $model, $description);
    }

    public  function show(int $id){

        $logica = new LogicaSensor();
        return $logica->obtenerSensorConId($id);
    }

    public function delete(Request $request)
    {
        $logica = new LogicaSensor();
        return $logica->eliminarSensor($request->id);
    }
}
