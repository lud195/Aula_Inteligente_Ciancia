<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibilidadesTable extends Migration
{
    public function up()
    {
        Schema::create('disponibilidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_id')->constrained()->onDelete('cascade');
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');  // <--- esta línea
            $table->string('estado');
            $table->string('hora');
            $table->date('fecha');
            $table->timestamps();
        });
        
    }
    

    public function down()
    {
        Schema::dropIfExists('disponibilidades');
    }
}
