<?php

namespace Database\Seeders;

use App\Models\TipoRol;
use \App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();

        $this->call([GestionSeeder::class]);
        $this->call([UnidadSeeder::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([TipoRolesSeeder::class]);
    }
}