<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoDescuentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TipoDescuento::create([
            'nom_tipo' => 'Porcentaje',
            'estatus' => true,
        ]);

        \App\Models\TipoDescuento::create([
            'nom_tipo' => 'Monto Fijo',
            'estatus' => true,
        ]);    }
}
