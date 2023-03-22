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
        Schema::create('categoria_user', function (Blueprint $table) {
            $table->foreignId("categoria_id")->constrained();
            $table->foreignId("user_id")->constrained();
            $table->string("Tipo");// define se e created, updated ou deleted
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_user');
    }
};
