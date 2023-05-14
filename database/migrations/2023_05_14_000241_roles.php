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
        Schema::create('roles', function (Blueprint $table){
            $table->increments('roles_id')->nullable(false)->autoIncrement();
            $table->string('display_name');
            $table->string('description');
            $table->date('created_at');
            // Add more columns as needed
            //define primary key
            $table->primary('roles_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
