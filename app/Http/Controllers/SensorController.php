<?php

namespace App\Http\Controllers;

use App\Models\Sensore;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index(){

        return Sensore::all();
    }

    public  function store(Request $request){

        $sensor = new Sensore();
        $sensor->name = $request->name;
        $sensor->description = $request->description;
        $sensor->model = $request->model;

        $sensor->save();

        return response()->json($sensor, 201);
    }

    public function update(Request $request){

        $sensor = Sensore::findOrFail($request->id);


        dd($request);
        $sensor->name = $request->name;
        $sensor->description = $request->description;
        $sensor->model = $request->model;

        $sensor->save();
        return response()->json($sensor, 200);
    }

    public  function show(int $id){
        return Sensore::find($id);
    }

    public function delete(Request $request)
    {
        $sensor = Sensore::destroy($request->id);

        return response()->json(null, 204);
    }
}
