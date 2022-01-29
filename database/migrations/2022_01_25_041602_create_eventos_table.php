<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('slug',60);
            $table->string('titulo',65);
            $table->string('descripcion');
            $table->string('contenido');
            $table->string('fecha')->nullable();
            $table->string('imagen',100)->nullable();
            $table->integer('total_votos')->default(0);
            $table->char('estado',1)->default('N')->comment('N:no editado| E:editado')->nullable();
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
        Schema::dropIfExists('eventos');
    }
}
