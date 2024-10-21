<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = Categoria::all(); 

        Producto::factory(100)->create()->each(function($producto) use ($categorias) 
        {
            $producto->id_categoria = $categorias->random()->id;
            $producto->save();
        }
    );
    }
}
