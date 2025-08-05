<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialFocosTable extends Migration
{
    public function up()
    {
        Schema::create('historial_focos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foco_id')->constrained()->onDelete('cascade');
            $table->date('fecha_cambio');
            $table->time('hora_inicio');
            $table->time('hora_fin')->nullable();
            $table->enum('accion', ['reparado', 'cambiado', 'revisado', 'fuera de servicio']);
            $table->enum('estado', ['apagado', 'encendido', 'en reparación', 'fuera de servicio']);
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('historial_focos');
    }
}
