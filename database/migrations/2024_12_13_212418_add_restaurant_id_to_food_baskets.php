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
        Schema::table('food_baskets', function (Blueprint $table) {
            // $table->unsignedBigInteger('basket_id');
            // $table->foreign('basket_id')->references('id')->on('baskets');
            // $table->unsignedBigInteger('restaurant_id');
            // $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('food_baskets', function (Blueprint $table) {
            //
        });
    }
};
