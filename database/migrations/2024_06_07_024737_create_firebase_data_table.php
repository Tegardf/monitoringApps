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
        Schema::create('firebase_data', function (Blueprint $table) {
            $table->id();
            $table->integer('hr');
            $table->integer('gsr');
            $table->integer('spo');
            $table->integer('br');
            $table->string('indicator');
            // Add more fields as needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firebase_data');
    }
};
