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
        Schema::table('beats', function (Blueprint $table) {
            $table->string('region_zone_id')->nullable(); // Adjust type if needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beats', function (Blueprint $table) {
            $table->dropColumn('region_zone_id');
        });
    }
};
