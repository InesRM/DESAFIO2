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
Route::get('getDiosProtector/{id}',[UserController::class, 'getDiosProtector']);
//faltan rutas.....



// Mario (de aquí para abajo)
Route::controller(InfoController::class)->prefix('general')->group(function() {

    Route::get('getdestino/{id}', 'getDestino')->middleware(['midHumano']);
    Route::put('updatedestino/{id}', 'updateDestino')->middleware(['midDios']);
    Route::get('getcaracteristicas/{id}', 'getCaracteristicas');
    Route::put('updatecaracteristicas/{id}', 'updateCaracteristicas')->middleware(['midDios']);
    Route::get('gethumanos/{idDios}', 'getHumanos')->middleware(['midDios']); // gethumanos/{idDios}
});


Route::controller(PruebasController::class)->prefix('pruebas')->group(function() {
    Route::post('insertpruebaeleccion', 'insertPruebaEleccion')->middleware(['midDios']);
    Route::post('insertpruebapuntual', 'insertPruebaPuntual')->middleware(['midDios']);
    Route::post('insertpruebaresplibre', 'insertPruebaRespLibre')->middleware(['midDios']);
    Route::post('insertpruebavaloracion', 'insertPruebaValoracion')->middleware(['midDios']);
    Route::get('getpruebas', 'getPruebas')->middleware(['midDios']);
    Route::get('gethumanosasig/{id}', 'getHumanosAsig')->middleware(['midDios']);
    Route::post('asignarprueba', 'asignarPrueba')->middleware(['midDios']);
});
