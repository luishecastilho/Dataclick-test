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
        Schema::create('usuario_clube__relations', function (Blueprint $table) {
            $table->id();
            $table->boolean('valid')->default(true);
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('clube_id');
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('clube_id')->references('id')->on('clubes');

            $table->index(['usuario_id', 'clube_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_clube__relations');
    }
};
