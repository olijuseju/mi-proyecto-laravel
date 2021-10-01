<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        return User::all();
    }

    public  function store(Request $request){

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->password = $request->password;


        $user->save();

        return response()->json($user, 201);
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
        return User::find($id);
    }

    public function delete(Request $request)
    {
        $user = User::destroy($request->id);;

        return response()->json(null, 204);
    }
}
