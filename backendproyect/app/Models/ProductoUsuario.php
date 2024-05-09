<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoUsuario extends Model
{
    use HasFactory;
    protected $table = "productousuario";
    protected $primarykey = "id";
    protected $fillable = ["id","producto_id","usuario_id"];
    public $timestamps = false;
}
