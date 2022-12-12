<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Humano;
use Illuminate\Support\Facades\Redis;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\DB;


class InfoController extends Controller {

    public function getDestino(Request $request) {
        try {
            $user = Humano::find($request->id);

            $resp  = response()->json(['destino' => $user->destino], 200);
        }
        catch (\Exception $e) {
            $resp = response()->json(['error' => 'ha ocurrido un error'], 204);
        }

        return $resp;
    }

    public function updateDestino(Request $request) {
        $datos = $request->all();

        $user = Humano::find($request->id);
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

    public function updateCaracteristicas($id, Request $request) {
        $datos = $request->all();

        $user = User::find($id);

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

    public function getHumanos($idDios) { // HACER JOIN Y WHERE IDDIOS = AL DEL DIOS Q LO HACE
        try {
            $humanos = DB::select('SELECT id, name, sabiduria, nobleza, virtud, maldad, audacia FROM users
                JOIN humanos ON users.id = humanos.id_humano WHERE humanos.idDios = ?', [$idDios]);
            $resp = response()->json($humanos, 200);
        }
        catch (\Exception $e) {
            $resp = response()->json(['mensaje' => 'ha surgido un error']);
        }

        return $resp;
    }
}
