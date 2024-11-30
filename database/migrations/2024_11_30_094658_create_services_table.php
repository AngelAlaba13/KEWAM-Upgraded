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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('clientName');
            $table->string('address');
            $table->string('contactNo');
            $table->string('service');
            $table->text('serviceDescription');
            $table->string('serviceProvider');
            $table->decimal('price', 10, 2); // 10 total digits, 2 decimal places
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
