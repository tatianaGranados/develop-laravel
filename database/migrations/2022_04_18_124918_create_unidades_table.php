<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{

    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_unidad',300);
            $table->string('cod_unidad',20);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unidades');
    }
}
