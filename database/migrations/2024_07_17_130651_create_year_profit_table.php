<?php

use Carbon\Carbon;
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
        Schema::create('year_profit', function (Blueprint $table) {
            $table->id();
            // all month
            $table->foreignId('seller_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('year')->nullable()->default(Carbon::now()->year);
            $table->decimal('january')->nullable()->default(0);
            $table->decimal('february')->nullable()->default(0);
            $table->decimal('march')->nullable()->default(0);
            $table->decimal('april')->nullable()->default(0);
            $table->decimal('may')->nullable()->default(0);
            $table->decimal('june')->nullable()->default(0);
            $table->decimal('july')->nullable()->default(0);
            $table->decimal('august')->nullable()->default(0);
            $table->decimal('september')->nullable()->default(0);
            $table->decimal('october')->nullable()->default(0);
            $table->decimal('november')->nullable()->default(0);
            $table->decimal('december')->nullable()->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('year_profit');
    }
};
