<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\HumanoController;
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



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [userController::class, 'index']);
    Route::put('/humanos/AsignarDios/{id}', [HumanoController::class, 'AsignarDios']);
    Route::get('/users/mostrarVidaPorNombre/{nombre}', [userController::class, 'mostrarVidaPorNombre'])->middleware('midHumanos');
    Route::get('/users/mostrarVidaPorId/{id}', [userController::class, 'mostrarVidaPorId'])->middleware('midHumanos');
    Route::post('/users/crearHumanos', [userController::class, 'crearHumanos'])->middleware(['midDios', 'midHades']);
    Route::delete('/users/matar/{id}', [userController::class, 'matar'])->middleware('midHades');
    Route::put('/users/actualizaciondeDios/{id}', [userController::class, 'actualizaciondeDios'])->middleware(['midDios','midHades']);
    Route::put('/users/activarHumano/{id}', [UserController::class, 'activarHumano']);
    //Esta ruta ha sido para una prueba, no lo voy a borrar de momento, aunque no se usa aún...pero tengo una idea para usarla en el futuro de la app
    //Route::post ('/users/asignarValoresAleatorios/{id}', [userController::class, 'asiganarValoresAleatorios'])->middleware('midDios');
});

