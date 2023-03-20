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
        Schema::table('usuarios', function (Blueprint $table) {
            $table->string('email', 250)->unique()->change();
        });
        Schema::table('clubes', function (Blueprint $table) {
            $table->string('name', 500)->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clubes', function (Blueprint $table) {
            $table->string('name', 500)->change();
        });
        Schema::table('usuarios', function (Blueprint $table) {
            $table->string('email', 250)->change();
        });
    }
};
