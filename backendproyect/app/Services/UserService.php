<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data)
    {
        // Validar los datos si es necesario

        // Lógica de negocio para crear un nuevo usuario
        return $this->userRepository->create($data);
    }

    public function getAllUsers()
    {
        // Obtener todos los usuarios utilizando el UserRepository
        return $this->userRepository->index();
    }

    public function getUserById($id)
    {
        // Obtener un usuario por su ID utilizando el UserRepository
        return $this->userRepository->findById($id);
    }

    public function updateUser($id, array $data)
    {
        return $this->userRepository->update($id, $data);
    }

    // Otros métodos para manejar la lógica de negocio relacionada con los usuarios
}