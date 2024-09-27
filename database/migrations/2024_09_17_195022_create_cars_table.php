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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // STRING
            $table->string('brand'); // STRING
            $table->string('model'); // STRING
            $table->integer('year'); // INTEGER
            $table->string('car_type'); // STRING
            $table->decimal('daily_rent_price', 8, 2); // DECIMAL (8, 2) for price
            $table->boolean('availability')->default(true); // BOOLEAN default to true
            $table->string('image')->nullable(); // STRING nullable for car image

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
