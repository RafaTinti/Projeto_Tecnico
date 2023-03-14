<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pessoa>
 */
class PessoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');
        $n = random_int(0,1);
        return [
            "nome" => $faker->name(),
            "user_id" => 1,//usuario padrao
            "estado" => $faker->stateAbbr(),
            "cidade" => $faker->city(),
            "fis_ou_jur" => ($n)? "fisica" : "juridica",
            "cpf" => ($n)? $faker->cpf() : null,
            "cnpj" => ($n)? null : $faker->cnpj(),
            "ativo" => $faker->boolean(),
            "contato" => $faker->cellphoneNumber(),
            "email" => $faker->safeEmail(),
        ];
    }
}
