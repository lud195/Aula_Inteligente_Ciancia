<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('docente_id')->constrained()->onDelete('cascade'); // Relación 
            $table->string('carrera');
            $table->string('nombre')->unique();
            $table->tinyInteger('anio'); // Año de la materia
            $table->enum('tipo_cursada', ['Presencial', 'Virtual', 'Mixta']);
            $table->string('codigo')->unique();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('materias');
    }
}
