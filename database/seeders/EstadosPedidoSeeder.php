<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\EstadosPedido::create(['nom_estado' => 'Pendiente', 'estatus' => true]);
        \App\Models\EstadosPedido::create(['nom_estado' => 'En Proceso', 'estatus' => true]);
        \App\Models\EstadosPedido::create(['nom_estado' => 'Completado', 'estatus' => true]);
        \App\Models\EstadosPedido::create(['nom_estado' => 'Cancelado', 'estatus' => true]);
    }
}
