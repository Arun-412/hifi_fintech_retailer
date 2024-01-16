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
        Schema::create('stoneseeds', function (Blueprint $table) {
            $table->id();
            $table->string('account_code');
            $table->string('bank_name');
            $table->string('ifsc_code');
            $table->string('account_number')->unique();
            $table->string('account_holder_name');
            $table->string('verification_response')->nullable();
            $table->string('verification_status');
            $table->string('account_status');
            $table->string('created_by')->nullable();
            $table->string('verified_by')->nullable();
            $table->string('actions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stoneseeds');
    }
};
