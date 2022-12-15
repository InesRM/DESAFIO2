<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\UserController\activarHumano;
class EnviarCorreo extends Controller
{
    // Ines

    public static function enviarCorreo(Request $request)
    {

    $email = $request->input('email');
    $name = $request->input('name');

    $datos = [
        'name' => $name,
        'email' => $email,

    ];

    //se manda la vista "welcome" como cuerpo del correo
    Mail::send('welcome', $datos, function ($message) use ($email) {
        $message->to($email)->subject('Activación de cuenta');
        $message->from('asir201920200@gmail.com', 'Activación de cuenta');
    });

    return response()->json(["enviado" => true, "mensaje" => "Enviado", 200]);
    }
}
