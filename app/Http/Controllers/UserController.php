<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Logica\LogicaUser;

/**
 * @author Jose Julio Peñaranda
 * 2021-10-14
 */

/**
 * Este controlador se encarga de los usuarios
 * Es llamado por el archivo api.php para establecer comunicacion con la logica
 * Sus metodos permiten guardar, eliminar y recuperar usuarios
 */

class UserController extends Controller
{

    /**
     * Esta funcion se encarga de obtener todos los usuarios
     * @return String devuelve la respuesta REST
     */
    public function index(){

        $logica = new LogicaUser();
        return $logica->obtenerTodosLosUsers();
    }

    /**
     * Esta funcion se encarga de guardar un usuario
     * @return String devuelve la respuesta REST
     */
    public  function store(Request $request){
        $name = $request->name;
        $email = $request->email;
        $email_verified_at = $request->email_verified_at;
        $password = $request->password;
        $logica = new LogicaUser();
        return $logica->guardarUser($name, $email, $password);
    }


   /* public function update(Request $request, int $id){

        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->password = $request->password;

        return response()->json($user, 200);
    }*/

    /**
     * Esta funcion se encarga de obtener un usuario por su id
     * @return String devuelve la respuesta REST
     */
    public  function show(int $id){

        $logica = new LogicaUser();
        return $logica->obtenerUserConId($id);
    }

    /**
     * Esta funcion se encarga de eliminar un usuario por su id
     * @return String devuelve la respuesta REST
     */
    public function delete(Request $request)
    {
        $logica = new LogicaUser();
        return $logica->eliminarUser($request->id);
    }
}
