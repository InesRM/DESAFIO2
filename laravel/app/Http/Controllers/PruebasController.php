<?php

namespace App\Http\Controllers;

use App\Models\Humano;
use App\Models\Prueba;
use App\Models\PruebaEleccion;
use App\Models\PruebaOraculo;
use App\Models\PruebaPuntual;
use App\Models\PruebaRespLibre;
use App\Models\PruebaValoracion;
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


    public function insertPruebaRespLibre(Request $request) {
        $datos = $request->all();
        $resp = 0;

        $id = $this->insertPrueba($datos['destino'], $datos['titulo']);
        $this->insertPruebaOraculo($id, $datos['pregunta']);

        $p = new PruebaRespLibre;

        $p->id = $id;
        $p->palabras_clave = $datos['palabrasClave'];
        $p->porcentaje = $datos['porcentaje'];

        try {
            $p->save();
        }
        catch (\Exception $e) {
            $resp = -1;
        }

        return response()->json(['cod' => $resp], 200);
    }

    public function insertPruebaValoracion(Request $request) {
        $datos = $request->all();
        $resp = 0;

        $id = $this->insertPrueba($datos['destino'], $datos['titulo']);
        $this->insertPruebaOraculo($id, $datos['pregunta']);

        $p = new PruebaValoracion;

        $p->id = $id;
        $p->respuesta = $datos['valoracionCorrecta'];
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

    public function getPruebas() { // CAMBIAR A QUERY BUILDER
        $pruebas['eleccion'] = DB::select('SELECT pruebas.id, pruebas.destino, pruebas.titulo, pruebas_oraculo.pregunta,
            respuestaCorrecta, respuestaIncorrecta, atributo FROM pruebas JOIN pruebas_oraculo on pruebas.id = pruebas_oraculo.id
            JOIN pruebas_eleccion on pruebas_oraculo.id = pruebas_eleccion.id');

        $pruebas['respLibre'] = DB::select('SELECT pruebas.id, pruebas.destino, pruebas.titulo, pruebas_oraculo.pregunta,
            palabrasClave, porcentaje, atributo FROM pruebas JOIN pruebas_oraculo on pruebas.id = pruebas_oraculo.id
            JOIN pruebas_resp_libre on pruebas_oraculo.id = pruebas_resp_libre.id');

        foreach ($pruebas['respLibre'] as $prueba) {
            $prueba->palabra_clave = explode(' ', $prueba->palabra_clave);
        }

        $pruebas['valoracion'] = DB::select('SELECT pruebas.id, pruebas.destino, pruebas.titulo, pruebas_oraculo.pregunta,
            respuesta, atributo FROM pruebas JOIN pruebas_oraculo on pruebas.id = pruebas_oraculo.id
            JOIN pruebas_resp_libre on pruebas_oraculo.id = pruebas_valoracion.id');

        $pruebas['puntuales'] = DB::select('SELECT pruebas.id, pruebas.destino, pruebas.titulo, descripcion,
            porcentaje, atributo FROM pruebas JOIN pruebas_puntuales on pruebas.id = pruebas_puntuales.id');


        return response()->json($pruebas, 200);
    }

    public function getHumanosAsig(Request $request) {
        return response()->json(
            DB::select('SELECT idHumano, idPrueba FROM humano_prueba JOIN humanos on
            humano_prueba.idHumano = humanos.id_humano WHERE humanos.idDios = ? ORDER BY idPrueba', [$request->id]), 200);
    }

    public function asignarPrueba(Request $request) {
        try {
            DB::table('humano_prueba')->insert(
                ['idHumano' => $request->idHumano, 'idPrueba' => $request->idPrueba]
            );

            $resp = response()->json(['mensaje' => 'prueba asignada con éxito'], 201);
        }
        catch (\Exception $e) {
            $resp = response()->json(['mensaje' => 'ha ocurrido un error'], 204);
        }

        return $resp;
    }

    // private function getPruebasHumano($id) { // para listar pruebas de los humanos
    //     $humanoPruebas = Humano::find($id)->pruebas;


    //     $query['eleccion'] = 'SELECT pruebas.id, pruebas.destino, pruebas.titulo, pruebas_oraculo.pregunta,
    //     respuestaCorrecta, respuestaIncorrecta, atributo FROM pruebas JOIN pruebas_oraculo on pruebas.id = pruebas_oraculo.id
    //     JOIN pruebas_eleccion on pruebas_oraculo.id = pruebas_eleccion.id';

    //     $query['puntuales'] = 'SELECT pruebas.id, pruebas.destino, pruebas.titulo, descripcion,
    //         porcentaje, atributo FROM pruebas JOIN pruebas_puntuales on pruebas.id = pruebas_puntuales.id ';



    //     foreach ($humanoPruebas as $prueba) {
    //         switch ($prueba->tipo) {
    //             case 'puntual':
    //                 $query['puntuales'] += $prueba->
    //                 break;

    //             default:
    //                 # code...
    //                 break;
    //         }
    //     }
    // }
}


