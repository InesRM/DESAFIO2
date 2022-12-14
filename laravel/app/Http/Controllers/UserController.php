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
use App\Http\Controllers\HumanoController\AsignarDios;


/**
 * @group Humano
 * APIs para la gestión de humanos
 * @package App\Http\Controllers\API
 * @author Ines
 */


class UserController extends Controller // Ines*************************
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

    private function asignarDioses($humano) {
        $dioses = DB::select('SELECT id FROM users WHERE rol LIKE "dios"'); // ids de los dioses (falta el where)
        $atribDioses = DB::select('SELECT sabiduria, nobleza, virtud, maldad, audacia FROM users WHERE rol LIKE "dios"'); // atributos de los dioses (falta el where)





        $maxDiff = 0;
        foreach ($atribDioses as $key => $atribDios) { // recorro el array con las características de cada dios
            $diff = 0;
            foreach ($atribDios as $atributo => $valor) { // recorro las características de cada dios
                $diff += abs($valor - $humano[$atributo]); // voy sumando la diferencia para obtener la total
            }

            if ($diff > $maxDiff) $keyDios = $key;  // si la diferencia que tiene el humano con este dios es mayor que la máxima diferencia
                                                    // que había con cualquier otro dios, guardo la clave de este dios para asignarlo como su
                                                    // protector
        }

        return $dioses[$keyDios]->id;
    }

    public function activarHumano($id) {
        $user = User::find($id);

        $user->sabiduria = random_int(1, 5);
        $user->nobleza = random_int(1, 5);
        $user->virtud = random_int(1, 5);
        $user->maldad = random_int(1, 5);
        $user->audacia = random_int(1, 5);

        $h = Humano::find($id);

        echo 'antes';
        $h->idDios = $this->asignarDioses($user);


        $user->activo = 1;


        try {
            $user->save();
            $h->save();

            echo 'llega';
            $resp = ['mensaje' => 'Humano activado'];
        }
        catch (\Exception $e) {
            $resp = ['mensaje' => 'ha ocurrido un error'];
        }

        return response()->json($resp, 200);
    }
}
