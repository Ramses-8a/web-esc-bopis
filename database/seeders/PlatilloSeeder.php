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
            'imagen_url' => 'https://imgs.search.brave.com/RpLzK3urgzhz6pH9v-popm36WZojgIUJMl0oTA7gwXU/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy90/aHVtYi9mL2Y2L0Vh/dGFseV9MYXNfVmVn/YXNfLV9GZWJfMjAx/OV8tX1NhcmFoX1N0/aWVyY2hfMTIuanBn/LzUxMnB4LUVhdGFs/eV9MYXNfVmVnYXNf/LV9GZWJfMjAxOV8t/X1NhcmFoX1N0aWVy/Y2hfMTIuanBn',
            'estatus' => true,
            'fk_categoria_alimento' => 1,
        ]);

        \App\Models\Platillo::create([
            'nombre' => 'Hamburguesa Clásica',
            'descripcion' => 'Hamburguesa con carne, lechuga, tomate y queso.',
            'precio' => 9.75,
            'imagen_url' => 'https://imgs.search.brave.com/X4SQlUW3dFkO1XNmaBTiXhpcHPydr0NArK1aesCqH5Y/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMjA2/MTcxNjcwOS9lcy9m/b3RvL2hhbWJ1cmd1/ZXNhLWRlLWNvc3Rp/bGxhLWEtbGEtcGxh/bmNoYS5qcGc_cz02/MTJ4NjEyJnc9MCZr/PTIwJmM9bEQ2V3VM/eElKMjZ4bTJjbVNT/UVh3R19wSzRXSEN2/OEhaM1lqLXFDREVX/RT0',
            'estatus' => true,
            'fk_categoria_alimento' => 2,
        ]);

        \App\Models\Platillo::create([
            'nombre' => 'Refresco Cola',
            'descripcion' => 'Bebida refrescante de cola.',
            'precio' => 2.00,
            'imagen_url' => 'https://imgs.search.brave.com/5KbwVmc9Ymcs_cF6dGvePfHqv4r0DHZvfU3LNhJVPRU/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9zdDIu/ZGVwb3NpdHBob3Rv/cy5jb20vNDQzMTA1/NS8xMTg1NS9pLzQ1/MC9kZXBvc2l0cGhv/dG9zXzExODU1Mjc0/Mi1zdG9jay1waG90/by1jb2NhLWNvbGEt/Y2Fuc2dsYXNzLWFu/ZC1ib3R0bGVzLmpw/Zw',
            'estatus' => true,
            'fk_categoria_alimento' => 3,
        ]);
    }
}
