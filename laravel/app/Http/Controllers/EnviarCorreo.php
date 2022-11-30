<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\UserController\activarHumano;
class EnviarCorreo extends Controller
{
    public static function enviarCorreo(Request $request){

        $email = $request->input('email');
        $name = $request->input('name');
        $id = $request->input('id');
        $data = array('name'=>$name, 'id'=>$id, "body" => "Hola, $name, gracias por registrarte en nuestra web
        para activar tu cuenta pulsa en el siguiente enlace: http://localhost:8000/api/activarHumano/$id");

        Mail::send('welcome', $data, function($message) use ($email, $name) {
            $message->to($email, $name)->subject('Activar cuenta');
            $message->from('asir201920200@gmail.com','Activar cuenta');
        });
        return response()->json("Correo enviado", 200);
    }



}
