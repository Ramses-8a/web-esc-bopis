<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TipoUsuarioSeeder::class,
            CategoriaAlimentosSeeder::class,
            PlatilloSeeder::class,
        ]);

        $this->call([TipoUsuarioSeeder::class]);
        $this->call([TipoDescuentoSeeder::class]);
        $this->call([PromocionesSeeder::class]);
        $this->call([UserMovilSeeder::class]);
        $this->call([PromocionClienteSeeder::class]);
        $this->call([EstadosPedidoSeeder::class]);
        $this->call([PedidosSeeder::class]);
        $this->call([DetallePedidoSeeder::class]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'estatus' => 1,
            'fk_tipo_usuario' => 1
        ]);
    }
}
