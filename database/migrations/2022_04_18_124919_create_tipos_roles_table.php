<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposRolesTable extends Migration
{

    public function up()
    {
        Schema::create('tipos_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_rol');
            $table->string('desc_tipo_rol')->default('s/n');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_roles');
    }
}
