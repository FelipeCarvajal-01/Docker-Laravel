<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\ProductoApiController;
use App\Http\Controllers\Api\TareaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
    *
    *   RUTAS PARA PRODUCTOS
    *
*/
// Obtener todos los productos
Route::get('productos',[ProductoApiController::class, 'index'])->middleware('auth:api');
// Obtener un producto por id
Route::get('productos/{id}',[ProductoApiController::class, 'show']);
// Crear un nuevo Producto
Route::post('productos',[ProductoApiController::class, 'store']);
// Actualizar un producto por id
Route::put('productos/{id}',[ProductoApiController::class, 'update']);
// Eliminar un producto por id
Route::delete('productos/{id}',[ProductoApiController::class, 'destroy']);

/*
    *
    *   RUTAS PARA TAREAS
    *
*/
// Obtener todos los tareas
Route::get('tareas',[TareaController::class, 'index']);
// Obtener un tareas por id
Route::get('tareas/{id}',[TareaController::class, 'show']);
// Crear un nuevo tareas
Route::post('tareas',[TareaController::class, 'store']);
// Actualizar un tareas por id
Route::put('tareas/{id}',[TareaController::class, 'update']);
// Eliminar un tareas por id
Route::delete('tareas/{id}',[TareaController::class, 'destroy']);

/*
    *
    *   RUTAS PARA PEDIDOS
    *
*/
// Obtener todos los pedidos
Route::get('pedidos',[PedidoController::class, 'index']);
// Obtener un pedidos por id
Route::get('pedidos/{id}',[PedidoController::class, 'show']);
// Crear un nuevo pedidos
Route::post('pedidos',[PedidoController::class, 'store']);
// Actualizar un pedidos por id
Route::put('pedidos/{id}',[PedidoController::class, 'update']);
// Eliminar un pedidos por id
Route::delete('pedidos/{id}',[PedidoController::class, 'destroy']);

//login
Route::post('login',[AuthApiController::class,'login']);

Route::get('login', function(){
    return response()->json('debe iniciar sesion');
})->name('login');

Route::post('register',[AuthApiController::class,'register']);

