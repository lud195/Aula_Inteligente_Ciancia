<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFocosTable extends Migration
{
    public function up()
    {
        Schema::create('focos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_id')->constrained()->onDelete('cascade');
            $table->string('codigo')->unique();
            $table->string('ubicacion');
            $table->integer('intensidad'); // ejemplo: cantidad de lúmenes
            $table->string('tipo'); // Ej: led, incandescente, fluorescente, etc.
            $table->boolean('estado')->default(true); // encendido (true) o apagado (false)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('focos');
    }
}
