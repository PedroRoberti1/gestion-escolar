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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();

        // Crea una columna 'usuario_id' como clave foránea que referencia 'id' en la tabla 'users'.
        // Si se elimina el usuario, también se eliminará automáticamente este registro (cascade delete)
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('ppff_id')->constrained('ppffs')->onDelete('cascade');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('ci')->unique();
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('foto');
            $table->enum('genero', ['masculino', 'femenino']);
            $table->enum('estado_estudiante', ['activo','inactivo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
