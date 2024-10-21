<?php

namespace Database\Factories;
use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleVenta>
 */
class DetalleVentaFactory extends Factory
{
    protected $model = DetalleVenta::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'id_venta' => Venta::factory(),
            'id_producto' => Producto::factory(),
            'cantidad' => $this->faker->numberBetween(1, 10),
            'precio_unitario' => $this->faker->randomFloat(2, 5, 100),
            'subtotal' => fn(array $attrs) => $attrs['cantidad'] * $attrs['precio_unitario'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
