<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTable extends Migration
{
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('ubicacion')->nullable();
            $table->integer('capacidad')->default(0);
            $table->enum('disponibilidad', ['Disponible', 'Ocupado', 'Mantenimiento'])->default('Disponible');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aulas');
    }
}
