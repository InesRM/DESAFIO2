<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();
            //$success['token'] =  $auth->createToken('access_token',["delete","read"])->plainTextToken;
            $success['token'] =  $auth->createToken('access_token', ['User', 'Dios'])->plainTextToken;
            $success['name'] =  $auth->name;
            return response()->json(["success" => true, "data" => $success, "message" => "Logged in!"], 200);
        }else {
            return response()->json(["success" => false, "message" => "Unauthorised"], 202);
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
        $success['token']  = $user->createToken('nuevo', ["User"])->plainTextToken;
        $success['name'] =  $user->name;

        return response()->json(["success" => true, "data" => $success, "message" => "User successfully registered!"], 200);
    }


    public function logout(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $cantidad = Auth::user()->tokens()->delete();
            //Auth('sanctum')->user()->tokens()->delete();
            return response()->json(["success" => $cantidad, "message" => "Tokens Revoked"], 200);
        } else {
            return response()->json(["success" => false, "message" => "Unauthorised"], 202);
        }
    }

}
