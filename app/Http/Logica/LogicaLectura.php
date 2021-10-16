<?php
namespace App\Http\Logica;

use App\Models\Lectura;

/**
 * @author Jose Julio Penyaranda
 *
 */
class LogicaLectura{

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
}
