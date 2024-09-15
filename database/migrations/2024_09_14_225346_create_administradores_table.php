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
        Schema::create('administradores', function (Blueprint $table) {
            $table->id();  // ID del administrador
            $table->string('nombre', 40);  // Nombre del administrador
            $table->string('cedula', 20);  // Cédula
            $table->string('email', 50)->unique();  // Email único
            $table->string('contrasena', 255);  // Contraseña
            $table->string('cargo', 40);  // Cargo
            $table->boolean('gestor');  // Permisos de gestión avanzada
            $table->unsignedBigInteger('id_usuario')->nullable();  // Referencia a usuario
            $table->timestamps();


            $table->foreign('id_usuario')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradores');
    }
};
