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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('phone'); // 10-digit phone number
            $table->date('dob');
            $table->string('partner_name'); 
            $table->date('event_date');
            $table->enum('event_type', ['wedding', 'pre_wedding', 'honeymoon']); 
            $table->string('city'); 
            $table->float('budget', 10, 2); // Budget with precision
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};