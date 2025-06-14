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
        Schema::create('machines', function (Blueprint $table) {
        $table->id();
        $table->string('serial_number')->unique();
        $table->string('model');
        $table->integer('kilometers')->nullable();
        $table->string('email')->nullable();
        $table->foreignId('type_id')->constrained('machine_types')->onDelete('cascade');
        $table->foreignId('status_id')->constrained('statuses')->onDelete('restrict');
        $table->timestamps();
});

        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
