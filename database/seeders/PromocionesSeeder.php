<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromocionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Promocion::create([
            'codigo' => 'DESC10',
            'descripcion' => '10% de descuento en tu primera compra',
            'fk_tipo_descuento' => 1, // ID de Porcentaje
            'valor_descuento' => 10.00,
            'fecha_inicio' => '2024-01-01 00:00:00',
            'fecha_fin' => '2024-12-31 23:59:59',
            'estatus' => true,
            'nombre_promo' => 'Descuento de Bienvenida',
        ]);

        \App\Models\Promocion::create([
            'codigo' => 'ENVIOFREE',
            'descripcion' => 'Envío gratis en pedidos mayores a $50',
            'fk_tipo_descuento' => 2, // ID de Monto Fijo
            'valor_descuento' => 0.00,
            'fecha_inicio' => '2024-01-01 00:00:00',
            'fecha_fin' => '2024-12-31 23:59:59',
            'estatus' => true,
            'nombre_promo' => 'Envío Gratis',
        ]);    }
}
