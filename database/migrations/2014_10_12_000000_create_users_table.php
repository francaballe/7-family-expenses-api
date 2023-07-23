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
            $table->id();   //integer unsigned increment
            $table->string('name'); //varchar(255) or string('name',137) to have a max 137 chars
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            //$table->timestamp('email_verified_at')->nullable();            
            //$table->rememberToken();
            //$table->timestamps();
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
