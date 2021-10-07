<?php
namespace App\Http\Logica;

use App\Models\Sensore;

class LogicaSensor{

    public function guardarSensor(string $name, string $model, string $description){
        $sensore = new Sensore();
        $sensore->name = $name;
        $sensore->model = $model;
        $sensore->description = $description;

        $sensore->save();
        return response()->json($sensore, 201);
    }

    public function obtenerTodosLosSensores(){
        return Sensore::all();
    }

    public function obtenerSensorConId(int $id){
        return Sensore::find($id);
    }

    public function eliminarSensor(int $id){
        $sensore= Sensore::destroy($id);
        return response()->json($sensore, 204);
    }
}

