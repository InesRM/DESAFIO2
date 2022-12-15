<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EnviarCorreo;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Humano;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Mail\SentMessage;
use function Symfony\Component\String\b;
/**
 * @group Auth
 * APIs para la autenticación
 * @Validator
 * @Registro, Login, Logout, Verificación de correo
 * @package App\Http\Controllers\API
 * @author Ines
 */


class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password]) || Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();

            switch ($auth->rol) {
                case 'humano':

                    $token['nombre'] = 'tokenUser';
                    $token['hab'] = ['humano'];
                    break;

                case 'dios':

                    $token['nombre'] = 'tokenDios';
                    $token['hab'] = ['dios'];
                    break;

                case 'hades':

                    $token['nombre'] = 'tokenHades';
                    $token['hab'] = ['hades'];
                    break;
            }

            $success['token'] =  $auth->createToken($token['nombre'], $token['hab'])->plainTextToken;
            $success['name'] =  $auth->name;

            response()->json(['success' =>true, $success], 200);

            return redirect('http://localhost:8080/html/interfazHumano.html')->with('success', 'Usuario logueado correctamente');
        } else {
            response()->json(["success" => false, "message" => "Unauthorised"], 202);
            return redirect('http://localhost:8080')->with('error', 'Usuario o contraseña incorrectos');;
        }
    }


    public function register(Request $request)
    {
        $messages = [
            'email' => 'El campo no se ajusta a un correo estándar',
            'max' => 'El campo se excede del tamaño máximo :max',
            'required' => 'El campo es obligatorio',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'rol' => 'string|max:20',
        ], $messages);

        if ($validator->fails()) {

            response()->json($validator->errors(), 400);
            return redirect()->back()->withErrors($validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);  //También vale: Hash::make($request->password)
        $user = User::create($input);
        $humano = Humano::create($input);
        EnviarCorreo::enviarCorreo($request); // envio el correo de verificación
        $success['token']  = $user->createToken('nuevo', ["User"])->plainTextToken;
        $success['name'] =  $user->name;

        response()->json(['success' => true, $success], 200);
        return redirect('http://localhost:8080/html/ok.html')->with('success', 'Usuario creado correctamente');
    }


    public function logout(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $cantidad = Auth::user()->tokens()->delete();
            // return response()->json(["success" => $cantidad, "message" => "Tokens Revoked"], 200);
           response ()->json (["success" => $cantidad, "message" => "Tokens Revoked"], 200);
            return redirect('http://localhost:8080/index.html')->with('success', 'Usuario deslogueado correctamente');
        } else {
            return response()->json(["success" => false, "message" => "Unauthorised"], 202);
        }
    }
}
