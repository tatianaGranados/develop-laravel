<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccesoSeeder extends Seeder
{
    public function run()
    {
        DB::table('accesos')->insert([
        	'id_tipo_rol'  => 1,
            'id_enlace'  => 10,
            'created_at'=>now(),
            'updated_at'=>now()
        ]); //1
    }
}
