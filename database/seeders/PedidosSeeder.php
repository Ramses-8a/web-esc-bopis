<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userMovilIds = \App\Models\UserMovil::pluck('id')->toArray();
        $estadosPedidoIds = \App\Models\EstadosPedido::pluck('id')->toArray();

        if (empty($userMovilIds) || empty($estadosPedidoIds)) {
            // Handle the case where there are no users or estados_pedido to link to
            // You might want to log an error or create some default records
            return;
        }

        \App\Models\Pedido::create([
            'fk_usuario' => $userMovilIds[array_rand($userMovilIds)],
            'total' => 1500,
            'fk_estado_pedido' => $estadosPedidoIds[array_rand($estadosPedidoIds)],
            'fk_metodo_pago' => null,
            'hora_recojo' => '18:00:00',
            'hora_pedido' => '17:30:00',
            'num_orden' => 'ORD001',
        ]);

        \App\Models\Pedido::create([
            'fk_usuario' => $userMovilIds[array_rand($userMovilIds)],
            'total' => 2500,
            'fk_estado_pedido' => $estadosPedidoIds[array_rand($estadosPedidoIds)],
            'fk_metodo_pago' => null,
            'hora_recojo' => '19:00:00',
            'hora_pedido' => '18:00:00',
            'num_orden' => 'ORD002',
        ]);
    }
}
