<?php
namespace App\Http\Logica;

use App\Models\Lectura;
use App\Models\Sensore;
use App\Models\User;

/**
 * @author Jose Julio Peñaranda
 * 2021-10-14
 */

class LogicaNegocio{
    /******************************************************
    /**
     * LOGICA SENSOR
     */

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

    /******************************************************
    /**
     * FIN LOGICA SENSOR
     */


    /******************************************************
    /**
     * LOGICA USER
     */

    /**
     * Esta funcion se comunica con la BBDD para guardar el usuario
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @return \Illuminate\Http\JsonResponse
     */
    public function guardarUser(string $name, string $email, string $password){
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;


        $user->save();

        return response()->json($user, 201);
    }

    /**
     *  Esta funcion se comunica con la BBDD para obtener todos los usuarios
     *
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function obtenerTodosLosUsers(){
        return User::all();
    }

    /**
     * Esta funcion se comunica con la BBDD para obtener un usuario dado su id
     *
     * @param int $id
     * @return mixed
     */
    public function obtenerUserConId(int $id){
        return User::find($id);
    }

    /**
     * Esta funcion se comunica con la BBDD para eliminar un usuario dado su id
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function eliminarUser(int $id){
        $user = User::destroy($id);
        return response()->json($user, 204);
    }

    /******************************************************
    /**
     * FIN LOGICA USER
     */


    /******************************************************
    /**
     * LOGICA LECTURA
     */

    /**
     * Esta funcion se comunica con la BBDD para guardar la medicion
     *
     *
     * @param string $data
     * @param int $id_sensor
     * @param float $latitud
     * @param float $longitud
     * @return \Illuminate\Http\JsonResponse
     */

    public function guardarMedicion(string $data, int $id_sensor, float $latitud, float $longitud){
        $lectura = new Lectura();
        $lectura->data = $data;
        $lectura->latitud = $latitud;
        $lectura->longitud = $longitud;
        $lectura->id_sensor = $id_sensor;
        $lectura->save();

        return response()->json($lectura, 201);
    }

    /**
     * Esta funcion se comunica con la BBDD para obtener las ultimas mediciones
     * @param int $numMediciones
     * @return mixed
     */

    public function obtenerUltimasMediciones(int $numMediciones){
        return Lectura::latest()
            ->take($numMediciones)
            ->get();
    }

    /**
     * Esta funcion se comunica con la BBDD para obtener todas las mediciones
     *
     * @return Lectura[]|\Illuminate\Database\Eloquent\Collection
     */
    public function obtenerTodasLasMediciones(){
        return Lectura::all();
    }

    /**
     * Esta funcion se comunica con la BBDD para obtener una medicion por su id
     *
     * @param int $id
     * @return mixed
     */

    public function obtenerLecturaConId(int $id){
        return Lectura::find($id);
    }

    /******************************************************
    /**
     * FIN LOGICA LECTURA
     */
}
