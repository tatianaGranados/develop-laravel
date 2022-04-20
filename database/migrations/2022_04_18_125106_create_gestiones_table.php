<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionesTable extends Migration
{
    public function up()
    {
        Schema::create('gestiones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gestion');
            $table->enum('activo',['SI','NO'])->default('SI');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gestiones');
    }
}
