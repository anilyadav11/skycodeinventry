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
        Schema::table('employees', function (Blueprint $table) {
            // Remove the foreign key constraint and the region_id column (if it exists)
            $table->dropForeign(['region_id']);
            $table->dropColumn('region_id');

            // Add region_id as an integer (non-foreign key)
            $table->string('region_id')->nullable(); // You can add `nullable()` if you want to allow null values
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Revert to foreignId if you want to undo the changes
            $table->dropColumn('region_id');
            $table->foreignId('region_id')->constrained('regions'); // Re-add the foreign key constraint
        });
    }
};
