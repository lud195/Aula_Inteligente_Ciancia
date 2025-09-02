<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCortinasTable extends Migration
{
    public function up()
    {
        
        Schema::create('cortinas', function (Blueprint $table) {
            $table->id();
            $table->string('estado');
            $table->enum('nivel_cortina', ['baja', 'media', 'alta']); // <-- aquí
            $table->unsignedBigInteger('aula_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cortinas');
    }
    
}
