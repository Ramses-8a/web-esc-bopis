<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromocionClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\PromocionCliente::create([
            'fk_promocion' => 1, // Asumiendo que existe una promoción con ID 1
            'fk_cliente' => 1, // Asumiendo que existe un cliente móvil con ID 1
            'fecha_aplicacion' => now(),
            'estatus' => true,
        ]);

        \App\Models\PromocionCliente::create([
            'fk_promocion' => 1, // Asumiendo que existe una promoción con ID 2
            'fk_cliente' => 1, // Asumiendo que existe un cliente móvil con ID 2
            'fecha_aplicacion' => now(),
            'estatus' => true,
        ]);    }
}
