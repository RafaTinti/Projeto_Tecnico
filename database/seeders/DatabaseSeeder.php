<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Pessoa;
use App\Models\Transacao;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserTableSeeder::class);//seeds o usuario defaut
        Pessoa::factory(50)->create();//cria 50 pessoas falsas
        Categoria::factory(20)->create(); //cria 10 categorias falsas
        Transacao::factory(50)->create(); //cria 50 transacoes falsas

        //cria relacaoes pata pessoas, categorias e transacoes onde o usuario padrao criou
        $pessoas = Pessoa::get();
        $categorias = Categoria::get();
        $transacaos = Transacao::get();
        foreach ($pessoas as $pessoa){
            $pessoa->users()->attach(1, ["tipo" => "created"]); // 
        }

        foreach ($categorias as $categoria){
            $categoria->users()->attach(1, ["tipo" => "created"]);
        }

        foreach ($transacaos as $transacao){
            $transacao->users()->attach(1, ["tipo" => "created"]); // 
        }
    }
}
