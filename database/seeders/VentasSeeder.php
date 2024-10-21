<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venta;
use App\Models\Cliente;

class VentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = Cliente::all();
        
        Venta::factory(100)->create()->each(function($venta) use ($clientes) 
        {
            $venta->id_cliente = $clientes->random()->id;
            $venta->save();
    });
}
}
