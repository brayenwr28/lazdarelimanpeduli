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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('donation_code')->unique();
            $table->string('donor_name');
            $table->string('donor_email')->nullable();
            $table->string('donor_phone');
            $table->enum('campaign_category', ['zakat', 'infak', 'sedekah', 'kemanusiaan', 'pemberdayaan']);
            $table->decimal('amount', 15, 2);
            $table->string('payment_method')->nullable();
            $table->enum('status', ['pending', 'success', 'expired'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
