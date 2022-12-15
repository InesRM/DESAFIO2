<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\EnviarCorreo;
use App\Http\Controllers\HumanoController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PruebasController;
use App\Http\Controllers\UserController;

//use App\Http\Controllers\API\RegisterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/users/login', [AuthController::class, 'login']);
Route::post('/users/logout', [AuthController::class, 'logout']);
Route::post('/users/register', [AuthController::class, 'register']);
Route::post('enviarCorreo', [EnviarCorreo::class, 'enviarCorreo']);
Route::get('/users/activarHumano/{email}',[UserController::class, 'activarHumano']);
Route::get('/getDiosProtector/{id}',[UserController::class, 'getDiosProtector']);
//faltan rutas.....



Route::controller(InfoController::class)->prefix('cosa')->group(function() {
    //faltan cosas.....
    Route::get('getdestino/{id}', 'getDestino');
    Route::put('updatedestino/{id}', 'updateDestino');
    Route::get('getcaracteristicas/{id}', 'getCaracteristicas');
    Route::put('updatecaracteristicas/{id}', 'updateCaracteristicas');
    Route::put('updatenombre/{id}', 'updateNombre');
    Route::get('gethumanos/{idDios}', 'getHumanos'); // gethumanos/{idDios}
});


Route::controller(PruebasController::class)->prefix('pruebas')->group(function() {
    Route::post('insertpruebaeleccion', 'insertPruebaEleccion');
    Route::post('insertpruebapuntual', 'insertPruebaPuntual');
    Route::post('insertpruebaresplibre', 'insertPruebaRespLibre');
    Route::post('insertpruebavaloracion', 'insertPruebaValoracion');
    Route::get('getpruebas', 'getPruebas');
    Route::get('gethumanosasig/{id}', 'getHumanosAsig');
    Route::post('asignarprueba', 'asignarPrueba');
});
