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
        Schema::create('faturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('relation_id');
            $table->date('expiry_date');
            $table->boolean('paid')->default(false);
            $table->decimal('amount', 8, 2);
            $table->timestamps();

            $table->foreign('relation_id')->references('id')->on('usuario_clube__relations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faturas');
    }
};
