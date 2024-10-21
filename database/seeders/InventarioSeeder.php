<?php

namespace Database\Seeders;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = Producto::all();

        Inventario::factory(150)->create()->each(function($inventario) use ($productos) {
            $inventario->id_producto = $productos->random()->id;
            $inventario->save();    
        });
    }
}
