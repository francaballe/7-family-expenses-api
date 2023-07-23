<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{    
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();   
            $table->date('expense_date');
            $table->date('due_date')->nullable();
            $table->string('description');
            $table->decimal('amount');
            $table->string('comment')->nullable();
            $table->string('proof_url')->nullable();
            $table->unsignedBigInteger('user_id');  //FK
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    
    public function down(): void
    {
        //
    }
};
