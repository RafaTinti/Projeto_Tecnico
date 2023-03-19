<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transacao>
 */
class TransacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => 1,
            "pessoa_id" => random_int(1,50), 
            "categoria_id" => random_int(1,20), 
            "descricao" => fake()->sentence(4), 
            "valor" => random_int(100, 1000000),
            "status" => random_int(0,1)? "pendente" : "liquidada",
            "vencimento" => Carbon::now(),
            "liquidada" => Carbon::now(),
        ];
    }
}
