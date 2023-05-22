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
        Schema::create('expenseCategory', function (Blueprint $table){
            $table->id('category_id');
            $table->string('category_name')->nullable();
            $table->string('description')->nullable();
            $table->date('created_at')->nullable();
            // Define primary key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenseCategory');
    }
};