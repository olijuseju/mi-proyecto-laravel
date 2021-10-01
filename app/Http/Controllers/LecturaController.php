<?php

namespace App\Http\Controllers;

use App\Models\Lectura;
use Illuminate\Http\Request;

class LecturaController extends Controller
{

    public function index(){

        return Lectura::all();
    }

    public  function store(Request $request){

        $lectura = new Lectura();

        $lectura->data = $request->data;
        $lectura->time_data = $request->time_data;
        $lectura->id_sensor = $request->id_sensor;

        $lectura->save();

        return response()->json($lectura, 201);
    }

    public function update(Request $request){

        $lectura = Lectura::findOrFail($request->id);

        $lectura->data = $request->data;
        $lectura->time_data = $request->time_data;
        $lectura->id_sensor = $request->id_sensor;

        $lectura->save();
        return response()->json($lectura, 200);
    }

    public  function show(int $id){
        return Lectura::find($id);
    }

    public function delete(Request $request)
    {
        $lectura = Lectura::destroy($request->id);

        return response()->json(null, 204);
    }
}
