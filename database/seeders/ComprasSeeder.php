<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Compra;
use App\Models\Proveedor;

class ComprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proveedores = Proveedor::all();

        Compra::factory(100)->create()->each(function($compra) use ($proveedores) {
            $compra->id_proveedor = $proveedores->random()->id;
            $compra->save();
        });
    }
}
