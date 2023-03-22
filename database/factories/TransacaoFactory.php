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
        $n = random_int(0,1);
        return [
            "pessoa_id" => random_int(1,50), 
            "categoria_id" => random_int(1,20), 
            "descricao" => fake()->sentence(4), 
            "valor" => random_int(100, 1000000),
            "status" => $n? "pendente" : "liquidada",
            "vencimento" => Carbon::now()->format("Y-m-d"),
            "liquidada" => $n ? null : Carbon::now()->format("Y-m-d"),
            "excluido" => false,// sempre falso ate ser modificado no destroy do controller
        ];
    }
}
