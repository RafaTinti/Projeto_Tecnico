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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");//qual usario fez o cadastro
            $table->unsignedBigInteger("modified_by_user_id");// qual usuario modificou por ultimo ou excluiu
            $table->boolean("excluido");
            $table->string("categoria");//nome da categoria
            $table->string("tipo");// se e credito ou debito
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("modified_by_user_id")->references("id")->on("users")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
