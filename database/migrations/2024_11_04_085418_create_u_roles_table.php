<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('u_roles', function (Blueprint $table) {
            $table->id();
            $table->string('level')->unique(); // e.g., Level 1
            $table->string('role'); // e.g., Admin
            $table->string('description'); // e.g., Administrative
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('u_roles');
    }
};
