<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productousuario', function (Blueprint $table) {
            $table->id(); // Define un campo de identificación autoincremental
            $table->unsignedBigInteger('producto_id'); // Define un campo de clave foránea para producto
            $table->unsignedBigInteger('usuario_id'); // Define un campo de clave foránea para usuario
        
            // Definir las claves foráneas
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productousuario');
    }
};
