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
        Schema::create('transactional_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_code');
            $table->string('mobile_number')->unique();
            $table->string('accounts')->nullable();
            $table->string('status');
            $table->string('verify_otp')->nullable();
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactional_users');
    }
};
