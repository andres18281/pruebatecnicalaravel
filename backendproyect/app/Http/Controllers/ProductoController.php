<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductoService;
use App\Http\Requests\StoreProductoRequest;
class ProductoController extends Controller
{


    public function __construct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }

    public function store(StoreProductoRequest $request)
    {
        // Validar la solicitud utilizando una clase Request

        // Llamar al servicio de usuarios para crear un nuevo usuario
        $user = $this->productoService->createProducto($request->all());

        // Devolver la respuesta adecuada al cliente
        return response()->json($user, 201);
    }

    public function index()
    {
        // Obtener todos los usuarios utilizando el UserService
        $users = $this->productoService->getAllProductos();

        // Retornar una respuesta JSON con todos los usuarios
        return response()->json($users);
    }

    public function show($id)
    {
        // Obtener un usuario por su ID utilizando el UserService
        $user = $this->productoService->getProductoById($id);

        // Verificar si el usuario existe
        if (!$user) {
            // Retornar una respuesta JSON con un mensaje de error si el usuario no existe
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Retornar una respuesta JSON con el usuario encontrado
        return response()->json($user);
    }

    public function update(StoreProductoRequest $request, $id)
    {
        // Validar los datos de la solicitud si es necesario

        // Actualizar el usuario utilizando el UserService
        $userUpdated = $this->productoService->updateProducto($id, $request->all());

        // Verificar si el usuario fue actualizado correctamente
        if (!$userUpdated) {
            // Retornar una respuesta JSON con un mensaje de error si el usuario no existe
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Retornar una respuesta JSON con los datos actualizados del usuario
        return response()->json($userUpdated);
    }
}
