<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Pessoa;
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
        Categoria::factory(10)->create(); //cria 10 categorias falsas
    }
}
