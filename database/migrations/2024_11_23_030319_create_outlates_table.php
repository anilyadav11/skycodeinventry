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
        Schema::create('outlates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->constrained('regions'); // Dropdown for region zone
            $table->foreignId('state_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->foreignId('district_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->foreignId('area_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->integer('user_role')->nullable();
            $table->date('doj')->nullable();
            $table->string('emp_role')->nullable();
            $table->string('emp_name')->nullable();
            $table->enum('emp_status', ['Active', 'Inactive'])->nullable();
            $table->date('emp_inactive')->nullable();
            $table->string('ss_side')->nullable();
            $table->string('ss_name')->nullable();
            $table->string('distributor_code')->nullable();
            $table->string('distributor_name')->nullable();
            $table->string('beat_name')->nullable();
            $table->string('outlate_type')->nullable();
            $table->string('outlate_name')->nullable();
            $table->string('outlate_address')->nullable();
            $table->string('outlate_contact_person_name')->nullable();
            $table->string('outlate_contact_person_number')->nullable();
            $table->string('outlate_status')->nullable();
            $table->date('dat_of_activation')->nullable();
            $table->string('dat_of_deactivation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlates');
    }
};
