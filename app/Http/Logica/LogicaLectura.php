<?php
namespace App\Http\Logica;

use App\Models\Lectura;

class LogicaLectura{


    public function guardarMedicion(string $data, int $id_sensor){
        $lectura = new Lectura();
        $lectura->data = $data;
        $lectura->id_sensor = $id_sensor;

        $lectura->save();

        return response()->json($lectura, 201);
    }

    public function obtenerUltimasMediciones(int $numMediciones){
        return Lectura::latest()
            ->take($numMediciones)
            ->get();
    }

    public function obtenerTodasLasMediciones(){
        return Lectura::all();
    }

    public function obtenerLecturaConId(int $id){
        return Lectura::find($id);
    }
}
