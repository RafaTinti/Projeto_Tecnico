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
        Schema::create('transacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pessoa_id");
            $table->unsignedBigInteger("categoria_id");
            $table->boolean("excluido")->default(false);
            $table->string("descricao");
            $table->bigInteger("valor"); //guarda valores em centavos com inteiro 10,00 = 1000
            $table->string("status");
            $table->timestamp("vencimento");
            $table->timestamp("liquidada")->nullable();
            $table->foreign("pessoa_id")->references("id")->on("pessoas")->onDelete("cascade");
            $table->foreign("categoria_id")->references("id")->on("categorias")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacaos');
    }
};
