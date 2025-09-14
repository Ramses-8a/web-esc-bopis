<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TipoUsuario::create(['nom_tipo' => 'Comun', 'estatus' => 1]);
        \App\Models\TipoUsuario::create(['nom_tipo' => 'Administrador','estatus' => 1]);
    }
}
