<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\AuthController as Auth;
use Illuminate\Validation\Rules\Exists;
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
            $rol = $request->input('rol');
            $new_User = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'rol' => $rol,
                'activo' => false,
                'donDefecto' => '',
                'tareas' => '',
                'vida' => '',
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

    //Función para crear tareas, provisional hasta que mario complete las pruebas
    // public function crearTareas(Request $request)
    // {
    //     $id = $request->input('id');
    //     $new_Tarea = DB::table('tareas')->where('id', $id)->get();
    //     if ($new_Tarea!=null) {
    //         return response()->json("La tarea ya existe", 200);
    //     } else {
    //         $name = $request->input('name');
    //         $description = $request->input('description');
    //        $new_Tarea = Tarea::create([
    //             'name' => $name,
    //             'description' => $description,
    //         ]);
    //         $res = "guardado una nueva Tarea";
    //         return response()->json($res, 200);
    //     }
    // }
    // public function matarTarea($idealiminar)
    // {
    //     $Tarea_delete = Tarea::find($idealiminar);
    //     if ($Tarea_delete == null) {
    //         return response()->json("No existe la Tarea", 200);
    //     } else {
    //         $Tarea_delete->delete();
    //         return response()->json("Tarea eliminada", 200);
    //     }
    // }
    // /**Aquí en esta función meteremos todas las actualizaciones
    //  * que puedan realizar los dioses con respecto a las tareas
    //  a los humanos o todos los poderes que se le quieran conceder,
    //  de momento es provisional hasta que mario complete las pruebas....
    //  y hagamos los algoritmos de las mismas*/
    // public function ActualizaciondeDiosTarea(Request $request, $id)
    // {
    //     $Tarea = Tarea::find($id);
    //     $name = $request->input('name');

    //     $description = $request->input('description');
    //     DB::table('tareas')->where('id', $id)->update([
    //         'name' => $name,
    //         'description' => $description,
    //     ]);


    //     $Tarea = DB::table('tareas')->get();
    //     $res = "Se ha actualizado el juego";
    //     return response()->json($res, 200);
    // }
    /** ***********************PENDIENTE DE IMPLEMENTAR Y FINALIZAR TAREAS.... */
    // public function mostrarTareasPorNombre($name)
    // {
    //     $Tareas = DB::table('tareas')->where('name', $name)->get();
    //     return response()->json($Tareas, 200);
    // }
    //*****************************SE HA SIMPLIFICADO DE MOMENTO INCLUYENDO LA ASIGNACIÓN TRAS LA ACTIVACIÓN EN EL MISMO MÉTODO */
    // public function asignarValoresAleatorios(Request $request)
    // {
    //     $User_activo = DB::table('users')->where('activo', true)->get();
    //     if ($User_activo) {
    //         $numeroAleatorio = rand(1, 5);
    //         $collection = collect([
    //             ['donDefecto' => 'sabiduria', 'grado' => $numeroAleatorio],
    //             ['donDefecto' => 'nobleza', 'grado' => $numeroAleatorio],
    //             ['donDefecto' => 'virtud', 'grado' => $numeroAleatorio],
    //             ['donDefecto' => 'maldad', 'grado' => $numeroAleatorio],
    //             ['donDefecto' => 'audacia', 'grado' => $numeroAleatorio],
    //         ]);
    //         $res = $collection->all();

    //         $plucked = $collection->pluck('grado'); // solo imprime los grados, los números
    //         $plucked->all();
    //     } else {
    //         $res = "No hay ningún humano activo";
    //     }
    //     return response()->json($res, 200);
    // }

    public function activarHumano($id)
    {
        $valoresAleatorios= ([
            [ rand(1,5)],
            [ rand(1,5)],
            [ rand(1,5)],
            [ rand(1,5)],
            [ rand(1,5)],
        ]);

        $User = User::find($id);
        $User_activo = DB::table('users')->where('id', $id)->get();

        if ($User_activo!=null) {
            DB::table('users')->where('id', $id)->update([
                'activo' => true,
                'donDefecto' => $valoresAleatorios,
            ]);
            return response()->json("Humano activado", 200);

        } else {
            return response()->json("El humano ya estaba activo", 200);
        }

    }
}
