<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Models\Producto;

class Detalle_VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ventas = Venta::all();
        $productos = Producto::all();

        DetalleVenta::factory(200)->create()->each(function($detalleVenta) use ($ventas, $productos) {
            $detalleVenta->id_venta = $ventas->random()->id;
            $detalleVenta->id_producto = $productos->random()->id;
            $detalleVenta->save();
    });

}

}
