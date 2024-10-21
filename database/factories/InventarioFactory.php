<?php

namespace Database\Factories;
use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventario>
 */
class InventarioFactory extends Factory
{
    protected $model = Inventario::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_producto' => Producto::factory(),
            'cantidad' => $this->faker->numberBetween(1, 100),
            'tipo_movimiento' => $this->faker->randomElement(['entrada', 'salida']),
            'fecha_movimiento' => $this->faker->dateTimeThisYear(),
            'created_at' => now(),
            'updated_at' => now(),   
             ];
    }
}
