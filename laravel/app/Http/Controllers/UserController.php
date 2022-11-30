<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\AuthController;
use GuzzleHttp\Promise\Each;
use App\Models\Humano;
use App\Http\Controllers\EnviarCorreo;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function mostrarHumanos()
    {
        $res = null;
        $Users = DB::table('users')->get();
        return response()->json($Users, 200);
    }

    public function mostrarVidaPorId($id)
    {
        $User_vida = User::find($id);
        $id = DB::table('users')->where('id', $id)->get();
        if ($User_vida == null) {
            return response()->json("No existe el usuario", 200);
        } else {
            return response()->json($User_vida, 200);
        }
    }

    public function mostrarVidaPorNombre($name)
    {
        $User_vida = User::find($name);
        $Users = DB::table('users')->where('name', $name)->get();
        if ($Users != $User_vida) {
            return response()->json("No se ha encontrado el nombre", 200);
        } else {
            return response()->json($Users, 200);
        }
    }

    public function crearHumanos(Request $request)
    {
        $id = User::find($request->id);
        $new_User = DB::table('users')->where('id', $id)->get()[0];
        $new_Humano = DB::table('humanos')->where('id_humano', '$id')->get(); // prueba
        if ($new_User != null || $new_Humano != null) {
            return response()->json("El usuario ya existe", 200);
        } else {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $new_User = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'activo' => false,

            ]);
            $new_Humano = Humano::create([    // Esto nos sirve para cuando se registra un usuario se cree un humano paralelamente
                'id_humano' => $new_User->id,
                'name' => $new_User->$name,
                'destino' => 0,

            ]);
        }

        $res = "guardado un nuevo Humano con id: " . $new_User->id;
    }
    public function matar($idealiminar)
    {
        $User_delete = User::find($idealiminar);
        if ($User_delete == null) {
            return response()->json("No existe el Humano", 200);
        } else {
            $User_delete->delete();
            return response()->json("Humano eliminado", 200);
        }
    }

    public static function activarHumano($id)
    {
        $user = User::find($id);
        $User_activo = DB::table('users')->where('id', $id)->get();

        if ($User_activo != null) {
            DB::table('users')->where('id', $id)->update([
                'activo' => true,
                'sabiduria' => random_int(1, 5),
                'nobleza' => random_int(1, 5),
                'virtud' => random_int(1, 5),
                'maldad' => random_int(1, 5),
                'audacia' => random_int(1, 5),
            ]);
            return response()->json("Humano activado", 200);

        } else {
            return response()->json("El humano ya estaba activo", 200);
        }
    }
}
