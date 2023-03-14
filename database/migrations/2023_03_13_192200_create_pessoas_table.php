<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("estado",2);
            $table->string("cidade");
            $table->string("fis_ou_jur");//fisico ou juridico valida no controller
            $table->string("documento")->unique();//guarda so o numero com o fis_ou_jur decide se e cpf ou cnpj
            $table->boolean("ativo")->default(true);// pessoas vao ser ativas ate que se modifique
            $table->string("contato");// guarda o numero como 81999270692
            $table->string("email", 255)->unique();
            //usuario que criou
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
