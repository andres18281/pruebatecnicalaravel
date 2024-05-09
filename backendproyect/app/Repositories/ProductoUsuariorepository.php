<?php

namespace App\Repositories;
use App\Models\ProductoUsuario;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Database\QueryException;
class ProductoUsuarioRepository
{
    protected $productoUserModel;

    public function __construct(ProductoUsuario $productoUserModel)
    {
        $this->productoUserModel = $productoUserModel;
    }

    public function create(array $data)
    {
        try{
          return $this->productoUserModel->create($data);

        } catch (QueryException $e) {
            // Capturar la excepción de la consulta SQL
            // Aquí puedes personalizar el mensaje de error que quieres devolver
            return ['error' => 'Hubo un error al crear el producto. Por favor, inténtelo de nuevo más tarde.'];
        }
    }

    public function update($id, array $data)
    {
        $productoUsuario = $this->findById($id);

        if (!$productoUsuario) {
            return false; // El registro no existe
        }

        return $productoUsuario->update($data);
    }

    public function delete($id)
    {
        $productoUsuario = $this->findById($id);

        if (!$productoUsuario) {
            return false; // El registro no existe
        }

        return $productoUsuario->delete();
    }

    public function getAllUsuariosRelacionadosConProducto($id)
    {
        // Utilizamos la relación definida en el modelo Producto
        $producto = Producto::findOrFail($id);
        return $producto->usuarios()->select('users.id', 'users.name', 'productousuario.id as idrela')->get();
    }

    public function getAllProductosRelacionadosConUsuario($id)
    {
        // Utilizamos la relación definida en el modelo User
        $user = User::findOrFail($id);
        return $user->productos()->select('productos.id', 'productos.nombreproducto', 'productousuario.id as idrela')->get();
    }

    /*

    public function getAllUsuariosRelacionadosConProducto($id)
    {
        return User::join('productousuario', 'users.id', '=', 'productousuario.usuario_id')
            ->join('productos', 'productousuario.producto_id', '=', 'productos.id')
            ->where('productos.id', $id) // Filtrar por el ID del producto
            ->select('users.id', 'users.name', 'productousuario.id as idrela')
            ->get();
    }

    public function getAllProductosRelacionadosConUsuario($id)
    {
        return Producto::join('productousuario', 'productos.id', '=', 'productousuario.producto_id')
            ->join('users', 'productousuario.usuario_id', '=', 'users.id')
            ->where('users.id', $id) // Filtrar por el ID del usuario
            ->select('productos.id', 'productos.nombreproducto','productousuario.id as idrela')
            ->get();
    }*/
    
    protected function findById($id)
    {
        return $this->productoUserModel->find($id);
    }

    // Otros métodos para manejar las operaciones CRUD en los usuarios
}