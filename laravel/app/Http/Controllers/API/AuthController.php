<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Humano;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Http\Controllers\EnviarCorreo;
use Http\Controllers\UserController;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Mail\SentMessage;
use function Symfony\Component\String\b;

class AuthController extends Controller
{
public function login(Request $request) {   // en vez de hacerlo con el correo lo hago con el nombre.
        // no es determinante, va un poco a gusto de cad uno.
        // con un or en el if podrían valer los dos.

if(Auth::attempt(['name' => $request->name, 'password' => $request->password])||Auth::attempt(['email' => $request->email, 'password' => $request->password])){
$auth = Auth::user();

switch ($auth->rol) { // dependiendo del rol le entrego un token u otro
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

return response()->json(["success"=>true,"data"=>$success, "message" => "Logged in!"],200);
}
else{
return response()->json(["success"=>false, "message" => "Unauthorised"],202);
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
            return response()->json($validator->errors(), 400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);  //También vale: Hash::make($request->password)
        $user = User::create($input);
        $humano=Humano::create($input);
        $success['token']  = $user->createToken('nuevo', ["User"])->plainTextToken;
        $success['name'] =  $user->name;


        return response()->json(["success" => true, "data" => $success, "message" => "User successfully registered!"], 200);
        //$activar=new EnviarCorreo();
    }


    public function logout(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $cantidad = Auth::user()->tokens()->delete();
            return response()->json(["success" => $cantidad, "message" => "Tokens Revoked"], 200);
        } else {
            return response()->json(["success" => false, "message" => "Unauthorised"], 202);
        }
    }


}


