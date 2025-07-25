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
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin')->nullable();
            $table->string('estado'); // Ej: encendido, apagado, mantenimiento
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_focos');
    }
}
