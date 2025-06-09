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
        Schema::create('periodos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            //Crea una columna llamada 'gestion_id' como clave foranea
            //que referencia a la columna 'id' de la tabla 'gestions'
            //Ademas, si se elimina una fila en 'gestions', se eliminaran automaticamente.
            //las filas relacionadas en esta tabla gracias a 'onDelete('cascade')'.

            $table->foreignId('gestion_id')->constrained('gestions')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodos');
    }
};
