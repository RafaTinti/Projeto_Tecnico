<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "categoria" => fake()->word,// sera em ingles infelizmente
            "tipo" => (random_int(0,1)) ? "debito" : "credito",
            // "modified_by_user_id" => 1, // mesmo usuario que criou inicialmente
            "excluido" => false,// sempre falso ate ser modificado no destroy do controller
        ];
    }
}
