<?php

namespace App\Services;

use App\Repositories\ProductoUsuarioRepository;

class ProductoUsuarioService
{
    protected $productoUsuarioRepository;

    public function __construct(ProductoUsuarioRepository $productoUsuarioRepository)
    {
        $this->productoUsuarioRepository = $productoUsuarioRepository;
    }

    public function createProductoUsuario(array $data)
    {
        // Validar los datos si es necesario

        // Lógica de negocio para crear un nuevo usuario
        return $this->productoUsuarioRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->productoUsuarioRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->productoUsuarioRepository->delete($id);
    }

    public function getAllUsuariosRelacionadosConProducto($id)
    {
        return $this->productoUsuarioRepository->getAllUsuariosRelacionadosConProducto($id);
    }

    public function getAllProductosRelacionadosConUsuario($id)
    {
        return $this->productoUsuarioRepository->getAllProductosRelacionadosConUsuario($id);
    }

    // Otros métodos para manejar la lógica de negocio relacionada con los usuarios
}