<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductoUsuarioService; 
use App\Http\Requests\StoreProductUserRequest;

class ProductoUserController extends Controller
{
    protected $productousuarioService;

    public function __construct(ProductoUsuarioService  $productousuarioService)
    {
        $this->productousuarioService = $productousuarioService;
    }

    public function store(StoreProductUserRequest $request)
    {
        // Validar la solicitud utilizando una clase Request

        // Llamar al servicio de usuarios para crear un nuevo usuario
        $user = $this->productousuarioService->createProductoUsuario($request->all());

        // Devolver la respuesta adecuada al cliente
        return response()->json($user, 201);
    }

    public function update(StoreProductUserRequest $request, $id)
    {
        // Validar los datos de la solicitud si es necesario

        // Actualizar el registro de ProductoUsuario utilizando el ProductoUsuarioService
        $productoUsuario = $this->productousuarioService->update($id, $request->all());

        // Verificar si el registro fue actualizado correctamente
        if (!$productoUsuario) {
            // Retornar una respuesta JSON con un mensaje de error si el registro no existe
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        // Retornar una respuesta JSON con el registro actualizado
        return response()->json($productoUsuario);
    }

    public function destroy($id)
    {
        // Eliminar el registro de ProductoUsuario utilizando el ProductoUsuarioService
        $deleted = $this->productousuarioService->delete($id);

        // Verificar si el registro fue eliminado correctamente
        if (!$deleted) {
            // Retornar una respuesta JSON con un mensaje de error si el registro no existe
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        // Retornar una respuesta JSON con un mensaje de éxito
        return response()->json(['message' => 'Registro eliminado correctamente']);
    }

    public function getAllUsuariosRelacionadosConProducto($id)
    {
        // Obtener todos los usuarios relacionados con un producto utilizando el ProductoUsuarioService
        $usuarios = $this->productousuarioService->getAllUsuariosRelacionadosConProducto($id);

        // Retornar una respuesta JSON con los usuarios obtenidos
        return response()->json($usuarios);
    }

    public function getAllProductosRelacionadosConUsuario($id)
    {
        // Obtener todos los productos relacionados con un usuario utilizando el ProductoUsuarioService
        $productos = $this->productousuarioService->getAllProductosRelacionadosConUsuario($id);

        // Retornar una respuesta JSON con los productos obtenidos
        return response()->json($productos);
    }
}
