<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersUnidadesTable extends Migration
{
    public function up()
    {
        Schema::create('users_unidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_unidad')->unsigned();
            $table->timestamps();
            
            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            
            $table->foreign('id_unidad')
                  ->references('id')
                  ->on('unidades')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_unidades');
    }
}
