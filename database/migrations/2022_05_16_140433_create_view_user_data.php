<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateViewUserData extends Migration
{
    public function up()
    {
        DB::statement(
            "CREATE or REPLACE VIEW view_users_data AS 
            (
                SELECT a.id_usuario, 
                        a.nombres, 
                        a.paterno, 
                        a.materno, 
                        a.genero, 
                        a.email,
                        a.username, 
                        a.password,
                        b.id_unidad,
                        b.nombre_unidad,
                        c.id_tipo_rol,
                        c.tipo_rol
                FROM (SELECT id as id_usuario, nombres, paterno, materno, genero, email, username, password
                    FROM users
                ) as a

                LEFT JOIN ( 
                    SELECT uu.id_usuario, unid.id as id_unidad,  unid.nombre_unidad
                    FROM users_unidades uu, unidades unid
                    WHERE uu.id_unidad= unid.id
                ) as b
                on b.id_usuario = a.id_usuario

                LEFT JOIN (
                    SELECT tipo.id as id_tipo_rol, tr.id_usuario, tipo.tipo_rol
                    FROM tipos_roles_user tr, tipos_roles tipo
                    WHERE tr.id_tipo_rol = tipo.id
                ) as c
                on c.id_usuario=a.id_usuario
            )
        ");
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS view_user_data');
    }
}
