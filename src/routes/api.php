<?php

use App\Http\Controllers\Api\AuthApiController;
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
// Obtener todos los productos
Route::get('productos',[ProductoApiController::class, 'index'])->middleware('auth:api');
// Optener un producto por id
Route::get('productos/{id}',[ProductoApiController::class, 'show']);
// Crear un nuevo Producto
Route::post('productos',[ProductoApiController::class, 'store']);
// Actualizar un producto por id
Route::put('productos/{id}',[ProductoApiController::class, 'update']);
// Eliminar un producto por id
Route::delete('productos/{id}',[ProductoApiController::class, 'destroy']);

// Tareas

// Obtener todos los productos
Route::get('tareas',[TareaController::class, 'index']);
// Optener un producto por id
Route::get('tareas/{id}',[TareaController::class, 'show']);
// Crear un nuevo Producto
Route::post('tareas',[TareaController::class, 'store']);
// Actualizar un producto por id
Route::put('tareas/{id}',[TareaController::class, 'update']);
// Eliminar un producto por id
Route::delete('tareas/{id}',[TareaController::class, 'destroy']);


//login
Route::post('login',[AuthApiController::class,'login']);

Route::get('login', function(){
    return response()->json('debe iniciar sesion');
})->name('login');


Route::post('register',[AuthApiController::class,'register']);

