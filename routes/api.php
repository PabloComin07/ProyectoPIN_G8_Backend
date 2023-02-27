<?php

use App\Http\Controllers\ContactoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Listado de contactos
Route::get('listadoContactos', [ContactoController::class, 'index']);

//Obtener datos de un contacto
Route::get('obtenerContacto/{id}', [ContactoController::class, 'show']);

//Agergar un contacto
Route::post('agregarContacto', [ContactoController::class, 'store']);

//Editar un contacto
Route::put('editarContacto/{id}', [ContactoController::class, 'update']);

//Eliminar un contacto
Route::delete('eliminarContacto/{id}', [ContactoController::class, 'destroy']);
