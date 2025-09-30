<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetallePedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pedidoIds = \App\Models\Pedido::pluck('id')->toArray();
        // Assuming Platillo model exists and has some records
        // $platilloIds = \App\Models\Platillo::pluck('id')->toArray();

        if (empty($pedidoIds)) {
            // Handle the case where there are no pedidos to link to
            return;
        }

        \App\Models\DetallePedido::create([
            'fk_pedido' => $pedidoIds[array_rand($pedidoIds)],
            'fk_platillo' => 1, // Placeholder, assuming a platillo with ID 1 exists or will be created
            'cantidad' => 2,
            'precio' => 500.00,
        ]);

        \App\Models\DetallePedido::create([
            'fk_pedido' => $pedidoIds[array_rand($pedidoIds)],
            'fk_platillo' => 2, // Placeholder
            'cantidad' => 1,
            'precio' => 1000.00,
        ]);
    }
}
