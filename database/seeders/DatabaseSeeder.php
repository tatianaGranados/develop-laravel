<?php

namespace Database\Seeders;

use App\Models\Acceso;
use App\Models\GastoConImputacion;
use \App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {      
        $this->call([GestionSeeder::class]);
        $this->call([UnidadSeeder::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([TipoRolesSeeder::class]);
        $this->call([EnlacesSeeder::class]);
        $this->call([TipoRolesUserSeeder::class]);
        $this->call([AccesoSeeder::class]);

        // GastoConImputacion::factory(10)->create();
    }
}
