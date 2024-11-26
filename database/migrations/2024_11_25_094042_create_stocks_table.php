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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('quantity');
            $table->ENUM('unit', ['per_pece', 'per_case'])->nullable();
            $table->integer('total_price')->nullable();
            $table->string('zone_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('area_id')->nullable();

            // SEPT Stock Columns
            $table->integer('sept_month_opening_stock')->default(0);
            $table->integer('sept_primary_order')->default(0);
            $table->integer('sept_month_closing_stock')->default(0);
            $table->integer('sept_secondary')->default(0);

            // TDP-1 Stock Columns
            $table->integer('tdp1_opening_stock')->default(0);
            $table->integer('tdp1_primary_order')->default(0);
            $table->integer('tdp1_month_closing_stock')->default(0);
            $table->integer('tdp1_secondary')->default(0);

            // TDP-2 Stock Columns
            $table->integer('tdp2_opening_stock')->default(0);
            $table->integer('tdp2_primary_order')->default(0);
            $table->integer('tdp2_month_closing_stock')->default(0);
            $table->integer('tdp2_secondary')->default(0);

            // TDP-3 Stock Columns
            $table->integer('tdp3_opening_stock')->default(0);
            $table->integer('tdp3_primary_order')->default(0);
            $table->integer('tdp3_month_closing_stock')->default(0);
            $table->integer('tdp3_secondary')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
