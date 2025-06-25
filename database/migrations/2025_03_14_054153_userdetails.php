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
        Schema::create('userdetail', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->float('height');
            $table->integer('Current_weight');
            $table->float('Desired_weight');
            $table->float('Maintenance_calories');
            $table->string('Sugar');
            $table->string('Colastrol');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
