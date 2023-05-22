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
        Schema::create('expenses', function (Blueprint $table){
            $table->id('expense_id');
            $table->string('expense_category')->nullable();
            $table->integer('amount')->nullable();
            $table->date('entry_date')->nullable();
            $table->date('created_at')->nullable();
            $table->unsignedBigInteger('user_id');
            // Define the foreign key constraint
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
