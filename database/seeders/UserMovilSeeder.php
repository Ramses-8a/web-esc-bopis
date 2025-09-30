<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserMovil;
use Illuminate\Database\Seeder;

class UserMovilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserMovil::create([
            'name' => 'ramses',
            'email' => 'ramses1@gmail.com',
            'password' => bcrypt('ramses123'),
            'estatus' => true,
            'fk_tipo_usuario' => 1,
        ]);

    }
}
