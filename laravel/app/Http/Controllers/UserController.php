<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\AuthController;


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
        $new_User = DB::table('users')->where('id', $id)->get();
        if ($new_User != null) {
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
                'sabiduria' => '',
                'nobleza' => '',
                'virtud' => '',
                'maldad' => '',
                'audacia' => '',
            ]);
            $res = "guardado un nuevo Humano";
            return response()->json($res, 200);
        }
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

    /**Aquí en esta función meteremos todas las actualizaciones
     * que puedan realizar los dioses con respecto a las tareas
  a los humanos o todos los poderes que se le quieran conceder,
  de momento es provisional hasta que mario complete las pruebas....
  y hagamos los algoritmos de las mismas*/
    public function ActualizaciondeDios(Request $request, $id)
    {
        $User = User::find($id);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $rol = $request->input('rol');

        DB::table('users')->where('id', $id)->update([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'rol' => $rol,
        ]);

        $User = DB::table('users')->get();
        $res = "Se ha actualizado el juego";
        return response()->json($res, 200);
    }

    public function mostrarTareas()
    {
        $res = null;
        $Tareas = DB::table('tareas')->get();
        return response()->json($Tareas, 200);
    }
    function mostrarTareasPorId($id)
    {
        $Tareas = DB::table('tareas')->where('id', $id)->get();
        return response()->json($Tareas, 200);
    }

   
    public function activarHumano($id)
    {

        $User = User::find($id);
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

