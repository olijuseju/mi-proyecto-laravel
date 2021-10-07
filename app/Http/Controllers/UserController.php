<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Logica\LogicaUser;

class UserController extends Controller
{
    public function index(){

        $logica = new LogicaUser();
        return $logica->obtenerTodosLosUsers();
    }

    public  function store(Request $request){
        $name = $request->name;
        $email = $request->email;
        $email_verified_at = $request->email_verified_at;
        $password = $request->password;
        $logica = new LogicaUser();
        return $logica->guardarUser($name, $email, $password);
    }

    public function update(Request $request, int $id){

        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->password = $request->password;

        return response()->json($user, 200);
    }

    public  function show(int $id){

        $logica = new LogicaUser();
        return $logica->obtenerUserConId($id);
    }



    public function delete(Request $request)
    {
        $logica = new LogicaUser();
        return $logica->eliminarUser($request->id);
    }
}
