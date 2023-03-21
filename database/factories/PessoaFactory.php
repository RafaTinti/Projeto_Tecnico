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
        $faker = \Faker\Factory::create('pt_BR');//precisar pra usar faker com dados BR
        $n = random_int(0,1);// numero aleatorio para definir se e jur ou fis
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
            "modified_by_user_id" => 1, // mesmo usuario que criou inicialmente
            "excluido" => false,// sempre falso ate ser modificado no destroy do controller
        ];
    }
}
