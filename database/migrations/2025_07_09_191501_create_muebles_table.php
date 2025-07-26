<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMueblesTable extends Migration
{
    public function up()
    {
        Schema::create('muebles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_id')->constrained()->onDelete('cascade');
            $table->string('tipo'); // proyector, silla, etc.
            $table->integer('cantidad')->default(1);
            $table->string('estado')->nullable();
            $table->string('numero_inventario')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('muebles');
    }
}
