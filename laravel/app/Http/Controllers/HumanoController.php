<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Humano;
/**
 * Summary of HumanoController
 * @package App\Http\Controllers
 * @author Ines
 */

class HumanoController extends Controller
{
    public static function AsignarDios($id_humano){
        $humano = Humano::find($id_humano, 'id_humano');

        if ($humano == null) {
            return response()->json("No existe el humano", 200);
        }
        $dios_atributos = DB::table('Users')->where('rol', 'dios')->orWhere('rol', 'hades')->get();
        //$user_atributos=DB::table('Users')->where('id', $id_humano)->get();
        $user = User::find($id_humano);

        $dios_protector = DB::table('Users')->where('rol', 'hades')->orWhere('rol', 'dios')->get('name');

        $diferencia = 0;
        /**
         * He probado a hacerlo con un foreach y con un for, he intentado varias fórmulas
         * con la función de Mario sin éxito, revisar y preguntar....
         * PENDIENTE*************
         */
        foreach ($dios_atributos as $dios) {
            $diferencia_dios = 0;
            $diferencia_dios += abs($dios->sabiduria - $user->sabiduria);
            $diferencia_dios += abs($dios->nobleza - $user->nobleza);
            $diferencia_dios += abs($dios->virtud - $user->virtud);
            $diferencia_dios += abs($dios->maldad - $user->maldad);
            $diferencia_dios += abs($dios->audacia - $user->audacia);


            if ($diferencia_dios >= $diferencia || $diferencia == 0) {
                $diferencia = $diferencia_dios;
                $dios_protector = $dios->name;

                DB::table('humanos')->where('id_humano', $id_humano)->update([
                    'dios_protector' => $dios_protector,
                ]);
            }
        }


        // Aquí haremos la redirección correspondiente en el dashboard del humano
        return response()->json($dios_protector, 200);




    }

// Path: app\Http\Controllers\HumanoController.php

    }



