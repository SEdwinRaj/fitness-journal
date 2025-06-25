<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('fooditems', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('total_calories');
        $table->float('protein');
        $table->float('carb');
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
        Schema::dropIfExists('fooditems');
    }
};
