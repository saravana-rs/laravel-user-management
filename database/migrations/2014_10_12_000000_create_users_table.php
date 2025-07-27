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
        $table->string('email')->unique(); 
        $table->string('user_name');
        $table->string('mobile');
        $table->date('dob');
        $table->enum('gender', ['Male', 'Female', 'Other']);
        $table->json('address1');
        $table->json('address2')->nullable(); 
        $table->enum('role', ['admin', 'user'])->default('user');
        $table->string('password');
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
