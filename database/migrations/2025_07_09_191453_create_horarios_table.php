<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
public function up()
{
    Schema::create('horarios', function (Blueprint $table) {
        $table->id();
        $table->foreignId('materia_id')->constrained()->onDelete('cascade');
        $table->string('dia'); // lunes, martes, etc.
        $table->time('hora_inicio');
        $table->time('hora_fin');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
