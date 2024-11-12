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
        Schema::table('beats', function (Blueprint $table) {
            $table->string('customer_type', 50)->change(); // Change size as needed
        });
    }

    public function down()
    {
        Schema::table('beats', function (Blueprint $table) {
            $table->string('customer_type')->change();
        });
    }
};
