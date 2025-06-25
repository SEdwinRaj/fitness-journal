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
        Schema::create('currentdata', function (Blueprint $table) {
            $table->integer('user_id')->primary();
            $table->string('name');
            $table->float('total_calories');
            $table->float('protein');
            $table->float('carbs');
            $table->float('fiber');
            $table->float('fat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdetail');
    }
};
