<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\EnviarCorreo;
use App\Http\Controllers\HumanoController;
use App\Http\Controllers\PruebasController;
use App\Hpp\middleware\midDios;
use App\Hpp\middleware\midHades;
use App\Hpp\middleware\midHumanos;
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
Route::get('/users/activarHumano/{id}',[UserController::class, 'activarHumano']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [userController::class, 'index']);
    Route::put('/humanos/AsignarDios/{id}', [HumanoController::class, 'AsignarDios']);
    Route::get('/users/mostrarVidaPorNombre/{nombre}', [userController::class, 'mostrarVidaPorNombre'])->middleware(['midHumanos']);
    // Route::get('/users/mostrarVidaPorId/{id}', [userController::class, 'mostrarVidaPorId'])->middleware('midHumanos');
    Route::post('/users/crearHumanos', [userController::class, 'crearHumanos'])->middleware(['midDios', 'midHades']);
    Route::delete('/users/matar/{id}', [userController::class, 'matar'])->middleware(['midHades']);
});


Route::controller(InfoController::class)->prefix('info')->group(function() {
    Route::get('getdestino/{id}', 'getDestino');
    Route::put('updatedestino/{id}', 'updateDestino');
    Route::get('getcaracteristicas/{id}', 'getCaracteristicas');
    Route::put('updatecaracteristicas/{id}', 'updateCaracteristicas');
});

Route::controller(PruebasController::class)->prefix('pruebas')->group(function() {
    Route::post('insertpruebaeleccion', 'insertPruebaEleccion');
    Route::post('insertpruebapuntual', 'insertPruebaPuntual');
    Route::get('getpruebas', 'getPruebas');
});
