<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Add foreign keys for reporting hierarchy
            $table->foreignId('rsm_id')->nullable()->constrained('employees')->onDelete('set null');
            $table->foreignId('asm_id')->nullable()->constrained('employees')->onDelete('set null');
            $table->foreignId('ase_id')->nullable()->constrained('employees')->onDelete('set null');
            $table->foreignId('so_id')->nullable()->constrained('employees')->onDelete('set null');
            $table->foreignId('se_id')->nullable()->constrained('employees')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Drop the foreign keys and columns
            $table->dropForeign(['rsm_id']);
            $table->dropColumn('rsm_id');

            $table->dropForeign(['asm_id']);
            $table->dropColumn('asm_id');

            $table->dropForeign(['ase_id']);
            $table->dropColumn('ase_id');

            $table->dropForeign(['so_id']);
            $table->dropColumn('so_id');

            $table->dropForeign(['se_id']);
            $table->dropColumn('se_id');
        });
    }
};
