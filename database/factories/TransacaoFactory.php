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
            "pessoa_id" => random_int(1,50),// sao criadas 50 pessoas quando o seeder e rodado
            "categoria_id" => random_int(1,20),  
            "descricao" => fake()->sentence(4), // frase com 4 palavras aleatorias
            "valor" => random_int(100, 1000000), // valor entre 1.00 e 10000.00
            "status" => $n? "pendente" : "liquidada", // escolhe se esta pendente ou liquidada
            "vencimento" => Carbon::now()->format("Y-m-d"), //pega a hora atual
            "liquidada" => $n ? null : Carbon::now()->format("Y-m-d"), // se pendente null se nao a hora atual
            "excluido" => false,// sempre falso ate ser modificado no destroy do controller
        ];
    }
}
