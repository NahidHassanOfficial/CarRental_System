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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // BIGINT with foreign key constraint
            $table->foreignId('car_id')->constrained('cars'); // BIGINT with foreign key constraint
            $table->date('start_date'); // DATE
            $table->date('end_date'); // DATE
            $table->decimal('total_cost', 10, 2); // DECIMAL (10, 2) for total rental cost
            $table->enum('status', ['Canceled'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
