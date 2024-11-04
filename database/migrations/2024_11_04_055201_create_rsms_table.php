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
        Schema::create('rsms', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('emp_name');
            $table->string('user_role')->default('Regional Sales Manager');
            $table->string('phone_no');
            $table->text('address');
            $table->enum('region', ['East', 'West', 'North', 'South'])->unique(); // Unique constraint per region
            $table->string('email')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rsms');
    }
};
