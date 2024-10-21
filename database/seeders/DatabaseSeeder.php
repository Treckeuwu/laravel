<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UsuariosSeeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\ComprasSeeder;
use Database\Seeders\ProductosSeeder;
use Database\Seeders\Detalle_VentaSeeder;
use Database\Seeders\InventarioSeeder;  
use Database\Seeders\VentasSeeder;
use Database\Seeders\Cliente;
use Database\Seeders\ProveedorSeeder;
use Database\Seeders\CategoriasSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            UsuariosSeeder::class,
            Cliente::class,

            CategoriasSeeder::class,
            ProveedorSeeder::class,
            ProductosSeeder::class,
            InventarioSeeder::class,

            ComprasSeeder::class,
            VentasSeeder::class,

            Detalle_VentaSeeder::class,

        ]);
    }
}
