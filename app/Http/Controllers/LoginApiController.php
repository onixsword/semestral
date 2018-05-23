<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;

class LoginApiController extends Controller
{
    public function login(Request $request) {
        $usuario = 
            $request->input('usuario');
        $password = 
            $request->input('password');

        /*$password = bcrypt($password);*/

        //SELECT * FROM users WHERE email = usuario AND 
        //password = password
        $usuario =
            \App\User::where('email','=',$usuario)->first();
                //where('password','=',$password)->first();

        if ($usuario &&
            Hash::check($password, $usuario->password)) {

            //borra un antiguo registro
            $viejoToken = \App\Token::where('idUser','=',$usuario->id);
            if(!(is_null($viejoToken))){
                $viejoToken->delete();
            }
            
            //creo el token y regreso el usuario
            $nuevoToken = new \App\Token;
            $nuevoToken->idUser = $usuario->id;
            $nuevoToken->token = 
                substr(md5(microtime()),rand(0,26),20);
            $nuevoToken->save();
            $usuario["token"] = $nuevoToken;
            return $usuario;
        }

        $error = array();
        $error['exito'] = false;
        
        $error['mensaje'] = "Usuario y password no coinciden";
        return $error;

    }
}