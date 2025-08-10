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
        
            $table->unsignedBigInteger('aire_acondicionado_id');  // <-- Declara la columna primero
        
            $table->unsignedBigInteger('docente_id')->nullable();  // si es necesaria esta columna
        
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin')->nullable();
            $table->string('temperatura')->nullable();
        
            $table->timestamps();
        
            // Definir clave foránea después
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
