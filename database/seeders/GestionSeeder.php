<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GestionSeeder extends Seeder
{

    public function run()
    {
        DB::table('gestiones')->insert([
            'gestion'=>2019,
            'activo'=>'SI',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
