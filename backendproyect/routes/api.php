<?php

use App\Http\Controllers\UserController; // Importar UserController
use App\Http\Controllers\ProductoController; // Importar UserController
use App\Http\Controllers\ProductoUserController; // Importar UserController
use App\Http\Controllers\LoginController; 


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

Route::post('/login', [LoginController::class, 'login']);

Route::post('producto',[ProductoController::class, 'store']);
Route::get('productos',[ProductoController::class, 'index']);
Route::get('producto/{id}',[ProductoController::class, 'show']);

Route::post('usuario',[UserController::class, 'store']);
Route::get('usuario/{id}', [UserController::class, 'show']);
Route::get('usuarios', [UserController::class, 'index']);



Route::post('productousuario', [ProductoUserController::class, 'store']);
Route::put('productousuario/{id}', [ProductoUserController::class, 'update']);
Route::delete('productousuario/{id}', [ProductoUserController::class, 'destroy']);
Route::get('usuarios-relacionados-producto/{id}', [ProductoUserController::class, 'getAllUsuariosRelacionadosConProducto']);
Route::get('productos-relacionados-usuario/{id}', [ProductoUserController::class, 'getAllProductosRelacionadosConUsuario']);

