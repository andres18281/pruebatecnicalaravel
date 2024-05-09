<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\StorePersonRequest;
class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    

    public function store(StorePersonRequest $request)
    {
        // Validar la solicitud utilizando una clase Request

        // Llamar al servicio de usuarios para crear un nuevo usuario
        $user = $this->userService->createUser($request->all());

        // Devolver la respuesta adecuada al cliente
        return response()->json($user, 201);
    }

    public function index()
    {
        // Obtener todos los usuarios utilizando el UserService
        $users = $this->userService->getAllUsers();

        // Retornar una respuesta JSON con todos los usuarios
        return response()->json($users);
    }

    public function show($id)
    {
        // Obtener un usuario por su ID utilizando el UserService
        $user = $this->userService->getUserById($id);

        // Verificar si el usuario existe
        if (!$user) {
            // Retornar una respuesta JSON con un mensaje de error si el usuario no existe
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Retornar una respuesta JSON con el usuario encontrado
        return response()->json($user);
    }

    public function update(StorePersonRequest $request, $id)
    {
        // Validar los datos de la solicitud si es necesario

        // Actualizar el usuario utilizando el UserService
        $userUpdated = $this->userService->updateUser($id, $request->all());

        // Verificar si el usuario fue actualizado correctamente
        if (!$userUpdated) {
            // Retornar una respuesta JSON con un mensaje de error si el usuario no existe
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Retornar una respuesta JSON con los datos actualizados del usuario
        return response()->json($userUpdated);
    }
}
