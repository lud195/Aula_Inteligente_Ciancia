<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialUsoAiresTable extends Migration
{
    public function up()
    {
        Schema::create('historial_uso_aires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aire_acondicionado_id'); // 👈 Agregada
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin')->nullable();
            $table->string('temperatura')->nullable();
            $table->timestamps();

            // 👇 Agregamos la clave foránea
            $table->foreign('aire_acondicionado_id')
                ->references('id')
                ->on('aire_acondicionados')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_uso_aires');
    }
}
