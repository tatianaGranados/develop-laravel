<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesosTable extends Migration
{

    public function up()
    {
        Schema::create('accesos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo_rol')->unsigned();
            $table->integer('id_enlace')->unsigned();
            $table->timestamps();

            $table->foreign('id_tipo_rol')
                  ->references('id')
                  ->on('tipos_roles')
                  ->onDelete('cascade');
            
            $table->foreign('id_enlace')
                  ->references('id')
                  ->on('enlaces')
                  ->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('accesos');
    }
}
