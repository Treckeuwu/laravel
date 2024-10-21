<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Compra;
use App\Models\Proveedor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_proveedor' => Proveedor::factory(),
            'fecha_compra' => now(),
            'total' => $this->faker->randomFloat(2, 100, 10000), 
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
