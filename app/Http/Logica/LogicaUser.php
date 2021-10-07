<?php
namespace App\Http\Logica;

use App\Models\User;

class LogicaUser{

    public function guardarUser(string $name, string $email, string $password){
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;


        $user->save();

        return response()->json($user, 201);
    }

    public function obtenerTodosLosUsers(){
        return User::all();
    }

    public function obtenerUserConId(int $id){
        return User::find($id);
    }

    public function eliminarUser(int $id){
        $user = User::destroy($id);
        return response()->json($user, 204);
    }

}
