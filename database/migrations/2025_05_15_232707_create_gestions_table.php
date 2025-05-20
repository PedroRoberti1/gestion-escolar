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
        //CREAMOS UNA TABLA LLAMADA GESTION CON php artisan make:model Gestion -mcr
        Schema::create('gestions', function (Blueprint $table) {
            //POR defecto para esta tabla se crearon las columnas id y timestamps, nosotros agregamos la columna "nombre".
            //CONTINUAMOS CON PHP ARTISAN MIGRATE PARA SUBIR DICHA TABLA A LA BASE DE DATOS.
            $table->id();
            $table->string('nombre')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestions');
    }
};
