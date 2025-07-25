<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::create('muebles', function (Blueprint $table) {
        $table->id();
        $table->foreignId('aula_id')->constrained()->onDelete('cascade');
        $table->string('tipo'); // silla, escritorio, etc.
        $table->integer('cantidad')->default(1);
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
        Schema::dropIfExists('muebles');
    }
}
