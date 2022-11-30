<?php

namespace App\Http\Controllers;

use App\Models\Prueba;
use App\Models\PruebaEleccion;
use App\Models\PruebaOraculo;
use App\Models\PruebaPuntual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PruebasController extends Controller {

    private function insertPrueba($destino, $titulo) {
        $p = new Prueba;
        $resp = 0;

        $p->destino = $destino;
        $p->titulo = $titulo;
        try {
            $p->save();
            return $p->id;
        }
        catch (\Exception $e) {
            $resp = -1;
        }

        return response()->json(['cod' => $resp], 200);
    }

    private function insertPruebaOraculo($id, $pregunta) {
        $p = new PruebaOraculo;
        $resp = 0;

        $p->id = $id;
        $p->pregunta = $pregunta;
        try {
            $p->save();
        }
        catch (\Exception $e)  {
            $resp = -1;
        }

        return response()->json(['cod' => $resp], 200);
    }

    public function insertPruebaPuntual(Request $request) {
        $datos = $request->all();
        $resp = 0;

        $id = $this->insertPrueba($datos['destino'], $datos['titulo']);

        $p = new PruebaPuntual;

        $p->id = $id;
        $p->descripcion = $datos['descripcion'];
        $p->porcentaje = $datos['porcentaje'];
        $p->atributo = $datos['atributo'];

        try {
            $p->save();
        }
        catch (\Exception $e) {
            $resp = 0;
        }

        return response()->json(['cod' => $resp], 200);
    }

    public function insertPruebaEleccion(Request $request) {
        $datos = $request->all();
        $resp = 0;

        $id = $this->insertPrueba($datos['destino'], $datos['titulo']);
        $this->insertPruebaOraculo($id, $datos['pregunta']);

        $p = new PruebaEleccion;

        $p->id = $id;
        $p->respuestaCorrecta = $datos['respuestaCorrecta'];
        $p->respuestaIncorrecta = $datos['respuestaIncorrecta'];
        $p->atributo = $datos['atributo'];
        try {
            $p->save();

        }
        catch (\Exception $e) {
            $resp = -1;
        }

        return response()->json(['cod' => $resp], 200);
    }

    // GET PRUEBAS

    public function getPruebas(Request $request) {
        $pruebas['eleccion'] = DB::select('SELECT pruebas.id, pruebas.destino, pruebas.titulo, pruebas_oraculo.pregunta,
            respuestaCorrecta, respuestaIncorrecta, atributo FROM pruebas JOIN pruebas_oraculo on pruebas.id = pruebas_oraculo.id
            JOIN pruebas_eleccion on pruebas_oraculo.id = pruebas_eleccion.id')[0];

        // faltan pruebas de valoración y de resp libre

        $pruebas['puntuales'] = DB::select('SELECT pruebas.id, pruebas.destino, pruebas.titulo, descripcion,
            porcentaje, atributo FROM pruebas JOIN pruebas_puntuales on pruebas.id = pruebas_puntuales.id')[0];

        return response()->json($pruebas, 200);
    }

}
