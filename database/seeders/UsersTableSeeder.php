<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usersTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('users')->insert([
            'nombres'       => 'Administrador',
            'paterno'       => 'admin',
            'materno'       => 'Admin',
            'genero'        => 'M',
            'username'      =>'admin',
            'email'         => 'admin@gmail.com',
            'password'      => bcrypt('admin')
        ]);
        DB::table('users')->insert([
            'nombres'       => 'Marco',
            'paterno'=> 'pinto',
            'materno'       => '',
            'genero'        => 'M',
            'username'      =>'marco',
			'email'         => 'marco@gmail.com',
			'password'      => bcrypt('marco')
        ]);

        DB::table('users')->insert([
            'nombres'        => 'Angel',
            'paterno'        => 'gonzales',
            'materno'        => '',
            'genero'         => 'M',
            'username'       =>'angel',
            'email'          => 'angel@gmail.com',
            'password'       => bcrypt('angel')
        ]);
        DB::table('users')->insert([
            'nombres'        => 'Gregorio',
            'paterno'        => 'bejarano',
            'materno'        => '',
            'genero'         => 'M',
            'username'       =>'gregorio',
            'email'          => 'gregorio@gmail.com',
            'password'       => bcrypt('gregorio')
            
        ]);

    }
}