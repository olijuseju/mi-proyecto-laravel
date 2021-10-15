<?php
namespace App\Http\Logica;

use App\Models\Sensore;

class LogicaSensor{

    /**
     * Esta funcion se comunica con la BBDD para guardar el sensor
     *
     * @param string $name
     * @param string $model
     * @param string $description
     * @return \Illuminate\Http\JsonResponse
     */
    public function guardarSensor(string $name, string $model, string $description){
        $sensore = new Sensore();
        $sensore->name = $name;
        $sensore->model = $model;
        $sensore->description = $description;

        $sensore->save();
        return response()->json($sensore, 201);
    }

    /**
     * Esta funcion se comunica con la BBDD para obtener todos los sensores
     *
     * @return Sensore[]|\Illuminate\Database\Eloquent\Collection
     */
    public function obtenerTodosLosSensores(){
        return Sensore::all();
    }

    /**
     * Esta funcion se comunica con la BBDD para obtener un sensor dado su id
     *
     * @param int $id
     * @return mixed
     */

    public function obtenerSensorConId(int $id){
        return Sensore::find($id);
    }

    /**
     * Esta funcion se comunica con la BBDD para eliminar un sensor dado su id
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function eliminarSensor(int $id){
        $sensore= Sensore::destroy($id);
        return response()->json($sensore, 204);
    }
}

