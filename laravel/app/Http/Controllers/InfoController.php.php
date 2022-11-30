<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Humano;
use Illuminate\Support\Facades\Redis;
use Termwind\Components\Raw;

class InfoController extends Controller {

    public function getDestino(Request $request) {
        echo 'aaasdfasdfasdfaaasdf';
        try {
            $user = Humano::find($request->id);

            print_r($user);

            $resp  = response()->json(['destino' => $user->destino], 200);
        }
        catch (\Exception $e) {
            $resp = response()->json(['error' => 'ha ocurrido un error'], 204);
        }

        return $resp;
    }

    public function updateDestino(Request $request) {
        $datos = $request->all();

        $user = User::find($request->id);
        $user->destino = $datos['destino'];

        try {
            $user->save();

            $resp = response()->json(['mensaje' => 'modificado con éxito'], 201);
        }
        catch(\Exception $e) {
            $resp = response()->json(['mensaje' => 'ha surgido un error'], 204);
        }

        return $resp;
    }

    public function getCaracteristicas(Request $request) {
        try {
            $user = User::find($request->id);

            $caracteristicas = [
                'sabiduria' => $user->sabiduria,
                'nobleza' => $user->nobleza,
                'virtud' => $user->virtud,
                'maldad' => $user->maldad,
                'audacia' => $user->audacia
            ];

            $resp = response()->json($caracteristicas, 200);
        }
        catch (\Exception $e) {
            $resp = response()->json(['error' => 'ha ocurrido un error'], 204);
        }

        return $resp;
    }

    public function updateCaracteristicas(Request $request) {
        $datos = $request->all();

        $user = User::find($request->id);

        foreach ($datos as $caracterisitica => $valor) { // este bucle actualiza sólo las características que no están vacías
            if ($valor != '') $user->{($caracterisitica)} = $valor;
        }

        try {
            $user->save();

            $resp = response()->json(['mensaje' => 'modificado con éxito'], 201);
        }
        catch (\Exception $e) {
            $resp = response()->json(['mensaje' => 'ha surgido un error'], 204);
        }

        return $resp;
    }
}
