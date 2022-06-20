<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoRolesUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipos_roles_user')->insert([
            'id_usuario'=>1,
            'id_tipo_rol'=>1,
            'activo' => 'SI',
            'fecha_inicio' => null,
            'fecha_fin' =>null,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
