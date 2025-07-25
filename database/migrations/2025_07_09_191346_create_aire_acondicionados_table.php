<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAireAcondicionadosTable extends Migration
{
    public function up()
    {
        Schema::create('aire_acondicionados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_id')->constrained()->onDelete('cascade');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->enum('estado', ['Encendido', 'Apagado', 'En mantenimiento'])->default('Apagado');
            $table->enum('mantenimiento', ['Al día', 'Pendiente', 'En proceso'])->default('Al día');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aire_acondicionados');
    }
}

