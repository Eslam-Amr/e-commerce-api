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
        Schema::create('week_profit', function (Blueprint $table) {
            $table->id();
            // from satrday
            // this week last week
            $table->foreignId('seller_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('this_week_profit')->nullable()->default(0);
            $table->decimal('last_week_profit')->nullable()->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('week_profit');
    }
};
