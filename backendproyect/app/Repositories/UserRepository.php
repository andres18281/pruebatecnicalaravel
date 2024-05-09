<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function create(array $data)
    {
        return $this->userModel->create($data);
    }

    public function index()
    {
        return $this->userModel->all();
    }

    public function findById($id)
    {
        return $this->userModel->find($id);
    }

    public function update($id, array $data)
    {
        $user = $this->findById($id);

        if (!$user) {
            return false; // El usuario no existe
        }

        return $user->update($data);
    }



    // Otros métodos para manejar las operaciones CRUD en los usuarios
}