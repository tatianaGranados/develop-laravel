<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoRolesSeeder extends Seeder
{

    public function run()
    {
        DB::table('tipos_roles')->insert([
            'tipo_rol'=>'administrador',
            'desc_tipo_rol'=>'Administrador total de sistema',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('tipos_roles')->insert([
            'tipo_rol'=>'Cajero',
            'desc_tipo_rol'=>'Administrador de caja',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('tipos_roles')->insert([
            'tipo_rol'=>'tesoreria',
            'desc_tipo_rol'=>'Administrador creacion de comprobantes',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('tipos_roles')->insert([
            'tipo_rol'=>'almacen',
            'desc_tipo_rol'=>'archiva los doc con tomos y presta documento',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('tipos_roles')->insert([
            'tipo_rol'=>'reporte unidad',
            'desc_tipo_rol'=>'muestra cheques listos segun su unidad',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
