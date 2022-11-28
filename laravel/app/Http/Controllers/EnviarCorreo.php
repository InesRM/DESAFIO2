<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class EnviarCorreo extends Controller
{
    public function enviarCorreo(Request $request){
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email', // para el formato, validación del mismo
            'asunto' => '',
            'mensaje' => 'required'
        ]);
        $nombre = $request->nombre;
        $email = $request->email;
        $asunto = $request->asunto;
        $mensaje = $request->mensaje;
        $data = array('nombre' => $nombre, 'email' => $email, 'asunto' => $asunto, 'mensaje' => $mensaje);
        Mail::send('email', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to(' ');
        });
        return redirect()->back()->with('success', 'Mensaje enviado correctamente');
    }
}
