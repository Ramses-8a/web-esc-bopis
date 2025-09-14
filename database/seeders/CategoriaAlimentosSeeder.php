<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaAlimentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\CategoriaAlimento::create(['nom_cat' => 'Comida', 'estatus' => 1]);
        \App\Models\CategoriaAlimento::create(['nom_cat' => 'Refrigerios', 'estatus' => 1]);
        \App\Models\CategoriaAlimento::create(['nom_cat' => 'Bebidas', 'estatus' => 1]);
    }
}
