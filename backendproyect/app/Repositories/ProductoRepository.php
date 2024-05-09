<?php

namespace App\Repositories;
use App\Models\Producto;
use Illuminate\Database\QueryException;
class ProductoRepository
{
    protected $productoModel;

    public function __construct(Producto $productoModel)
    {
        $this->productoModel = $productoModel;
    }

    public function create(array $data)
    {
        try {
            return $this->productoModel->create($data);
        } catch (QueryException $e) {
            // Capturar la excepción de la consulta SQL
            // Aquí puedes personalizar el mensaje de error que quieres devolver
            return ['error' => 'Hubo un error al crear el producto. Por favor, inténtelo de nuevo más tarde.'];
        }
    }

    public function index()
    {
        return $this->productoModel->all();
    }

    public function findById($id)
    {
        return $this->productoModel->find($id);
    }

    public function update($id, array $data)
    {
        $user = $this->findById($id);

        if (!$user) {
            return false; // El usuario no existe
        }

        return $productoModel->update($data);
    }


    // Otros métodos para manejar las operaciones CRUD en los usuarios
}