<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadSeeder extends Seeder
{
    public function run()
    {
        DB::table('unidades')->insert([
        	'nombre_unidad'  => 'Agronomía',
            'cod_unidad'  => 'agro',
            'created_at'=>now(),
            'updated_at'=>now()
        ]); //1
        DB::table('unidades')->insert([
        	'nombre_unidad'  => 'Arquitectura',
            'cod_unidad'  => 'arq',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);//2
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Bioquímica',
            'cod_unidad'  => 'bio',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);//3
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'CESU',
            'cod_unidad'  => 'cesu',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);//4
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Clas',
            'cod_unidad'  => 'clas',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);//5
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Derecho',
            'cod_unidad'  => 'der',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);//6
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Desarrollo rural y territorial',
            'cod_unidad'  => 'ter',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);//7
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Don DYCIT donaciones Suecia Asdi',
            'cod_unidad'  => 'asdi',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Economía',
            'cod_unidad'  => 'eco',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Enfermeria',
            'cod_unidad'  => 'enf',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Esfor',
            'cod_unidad'  => 'esfor',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'EUPG',
            'cod_unidad'  => 'eupg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Humanidades',
            'cod_unidad'  => 'hum',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Humanidades Odontología',
            'cod_unidad'  => 'hodon',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Medicina',
            'cod_unidad'  => 'med',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Odontología',
            'cod_unidad'  => 'odon',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Sociología',
            'cod_unidad'  => 'soc',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Tecnología',
            'cod_unidad'  => 'tec',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Veterinaria',
            'cod_unidad'  => 'vet',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Varias Unidades de posgrado',
            'cod_unidad'  => 'varias',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Desarrollo De Programas - EUPG',
            'cod_unidad'  => 'ddpp',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('unidades')->insert([
            'nombre_unidad'  => 'Otros',
            'cod_unidad'  => 'otros',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
