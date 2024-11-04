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
        Schema::create('beats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_zone_id')->constrained('regions')->onDelete('cascade'); // Zone as foreign key from regions
            $table->foreignId('state_id')->nullable()->constrained('regions')->onDelete('cascade');
            $table->foreignId('district_id')->nullable()->constrained('regions')->onDelete('cascade'); // City (district)
            $table->string('area')->nullable();
            $table->string('beat_1')->nullable();
            $table->string('beat_2')->nullable();
            $table->string('beat_3')->nullable();
            $table->string('beat_4')->nullable();
            $table->string('beat_5')->nullable();
            $table->string('beat_6')->nullable();
            $table->string('beat_7')->nullable();
            $table->string('beat_8')->nullable();
            $table->string('beat_9')->nullable();
            $table->string('beat_10')->nullable();
            $table->string('beat_11')->nullable();
            $table->string('beat_12')->nullable();
            $table->foreignId('emp_role_id')->constrained('u_roles')->onDelete('cascade'); // EMP Role from u_roles
            $table->enum('customer_type', ['Super Stockist', 'Distributor']); // Customer Type dropdown
            $table->string('customer_name'); // Customer Name
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beats');
    }
};
