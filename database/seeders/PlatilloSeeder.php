<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatilloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Platillo::create([
            'nombre' => 'Pizza Pepperoni',
            'descripcion' => 'Deliciosa pizza con pepperoni y queso.',
            'precio' => 12.50,
            'imagen_url' => 'https://source.unsplash.com/random/800x600?pizza',
            'estatus' => true,
            'fk_categoria_alimento' => 1,
        ]);

        \App\Models\Platillo::create([
            'nombre' => 'Hamburguesa Clásica',
            'descripcion' => 'Hamburguesa con carne, lechuga, tomate y queso.',
            'precio' => 9.75,
            'imagen_url' => 'https://source.unsplash.com/random/800x600?hamburger',
            'estatus' => true,
            'fk_categoria_alimento' => 2,
        ]);

        \App\Models\Platillo::create([
            'nombre' => 'Refresco Cola',
            'descripcion' => 'Bebida refrescante de cola.',
            'precio' => 2.00,
            'imagen_url' => 'https://source.unsplash.com/random/800x600?soda',
            'estatus' => true,
            'fk_categoria_alimento' => 3,
        ]);
    }
}
