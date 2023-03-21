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
            // $table->unsignedBigInteger("user_id");//qual usario fez o cadastro
            // $table->unsignedBigInteger("modified_by_user_id");//qual usuario mmodificou por ultimo ou excluiu
            $table->boolean("excluido")->nullable();
            $table->string("nome");
            $table->string("estado",2);
            $table->string("cidade");
            $table->string("fis_ou_jur");//fisico ou juridico valida no controller
            $table->string("cpf")->unique()->nullable();//cpf ou null se juridica
            $table->string("cnpj")->unique()->nullable();
            $table->boolean("ativo")->default(true);// pessoas vao ser ativas ate que se modifique
            $table->string("contato");// guarda o numero como (81) 99927-0692
            $table->string("email", 255)->unique();
            // $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            // $table->foreign("modified_by_user_id")->references("id")->on("users")->onDelete("cascade");
            //user_id e chave estrangeira vindo da tabela users e quando o usuario e deletado deleta 
            //as pessoas que ele criou
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
