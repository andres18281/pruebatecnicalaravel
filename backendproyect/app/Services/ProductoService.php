<?php

namespace App\Services;

use App\Repositories\ProductoRepository;

class ProductoService
{
    protected $productoRepository;

    public function __construct(ProductoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function createProducto(array $data)
    {
        // Validar los datos si es necesario

        // Lógica de negocio para crear un nuevo usuario
        return $this->productoRepository->create($data);
    }
    
    public function getAllProductos()
    {
        // Obtener todos los usuarios utilizando el UserRepository
        return $this->productoRepository->index();
    }

    public function getProductoById($id)
    {
        // Obtener un usuario por su ID utilizando el UserRepository
        return $this->productoRepository->findById($id);
    }

    public function updateProducto($id, array $data)
    {
        return $this->productoRepository->update($id, $data);
    }

    // Otros métodos para manejar la lógica de negocio relacionada con los usuarios
}