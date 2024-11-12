<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('user_code')->unique(); // System-generated code
            $table->string('employee_name');
            $table->foreignId('user_role_id')->constrained('u_roles'); // Dropdown for user role
            $table->string('phone_no');
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->foreignId('region_id')->constrained('regions'); // Dropdown for region zone
            $table->foreignId('state_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->foreignId('district_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->foreignId('area_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->json('beats')->nullable(); // Multiple select for beats
            $table->json('distributors')->nullable(); // Multiple select for distributors
            $table->json('super_stockists')->nullable(); // Multiple select for super stockists
            $table->string('emp_code'); // Editable by HR
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
