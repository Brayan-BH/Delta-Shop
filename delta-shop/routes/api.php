<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\v1\ProductosController;
use App\Http\Controllers\v1\ClientesController;

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

//Productos

Route::get('/v1/productos', [ProductosController::class, 'getAll']);
Route::get('/v1/productos/{id}', [ProductosController::class, 'getItem']);
Route::post('/v1/productos', [ProductosController::class, 'storeProduct']);
Route::put('/v1/productos', [ProductosController::class, 'putUpdate']);
Route::patch('/v1/productos', [ProductosController::class, 'pacthUpdate']);
Route::delete('/v1/productos/{id}', [ProductosController::class, 'deleteProduct']);

//********************** */

//clientes

Route::get('/v1/clientes', [ClientesController::class, 'getCliente']);
Route::get('/v1/clientes/{id}', [ClientesController::class, 'getClienteById']);
Route::post('/v1/clientes', [ClientesController::class, 'saveCliente']);
Route::put('/v1/clientes', [ClientesController::class, 'putUpdateCliente']);
Route::patch('/v1/clientes/', [ClientesController::class,'patchUpdateCliente']);
Route::delete('/v1/clientes/{id}', [ClientesController::class, 'deleteCliente']);