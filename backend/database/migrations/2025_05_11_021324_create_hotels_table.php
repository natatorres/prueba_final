<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * 
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();                                      // PK
            $table->string('nombre');                          // Nombre del hotel
            $table->string('direccion');                       // Dirección física
            $table->string('ciudad');                          // Ciudad (catálogo estático)
            $table->string('nit')->unique();                   // NIT, único por hotel
            $table->unsignedInteger('num_habitaciones');       // Máximo de habitaciones
            $table->timestamps();
        });
    }

    /**
     * Revierte la migración.
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
