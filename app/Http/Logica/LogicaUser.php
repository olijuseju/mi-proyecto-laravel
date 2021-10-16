<?php
namespace App\Http\Logica;

use App\Models\User;

class LogicaUser{


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

}
