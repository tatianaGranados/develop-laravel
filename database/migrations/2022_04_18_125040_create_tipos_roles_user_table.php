<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposRolesUserTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_roles_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_tipo_rol')->unsigned();
            $table->timestamps();

            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            
            $table->foreign('id_tipo_rol')
                  ->references('id')
                  ->on('tipos_roles')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_roles_user');
    }
}
