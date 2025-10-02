<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
    'nombre' => $this->faker->words(3, true),
    'descripcion'=> $this->faker->sentence(10),
    'precio' => $this->faker->randomFloat(2, 500, 250000),
    'fecha_lanzamiento' => $this->faker->date(),
    'activo'=> $this->faker->boolean(),
    'id_categoria'=> $this->faker->numberBetween(1, 3),  
    ];

    }
}
