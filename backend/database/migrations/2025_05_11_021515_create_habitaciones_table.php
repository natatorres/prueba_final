<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionesTable extends Migration
{
    /**
     * 
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')
                  ->constrained('hotels')
                  ->onDelete('cascade');       // Si se borra hotel, se eliminan sus habitaciones

            $table->string('tipo');             // 'Estándar', 'Junior' o 'Suite'
            $table->string('acomodacion');      // 'Sencilla', 'Doble', 'Triple', 'Cuádruple'
            $table->unsignedInteger('cantidad'); // Cantidad de ese tipo

            // Impide duplicados por hotel / tipo / acomodación
            $table->unique(['tipo','acomodacion'], 'uq_hotel_tipo_acomod');

            $table->timestamps();
        });
    }

    /**
     * Revierte la migración.
     */
    public function down()
    {
        Schema::dropIfExists('habitaciones');
    }
}
