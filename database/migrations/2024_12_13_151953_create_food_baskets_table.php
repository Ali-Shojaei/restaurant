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
        Schema::create('food_baskets', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('basket_id');
            // $table->foreign('basket_id')->references('id')->on('baskets');
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('id')->on('food');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_baskets');
    }
};
