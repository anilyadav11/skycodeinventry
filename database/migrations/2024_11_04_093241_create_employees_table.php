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
            $table->string('user_code')->unique();
            $table->string('emp_name');
            $table->foreignId('user_role_id')->constrained('u_roles');
            $table->string('phone_no');
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->foreignId('region_id')->constrained('regions');
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('area')->nullable();
            $table->string('beat')->nullable(); // To store beat information
            $table->string('rsm')->nullable();
            $table->string('asm')->nullable();
            $table->string('ase')->nullable();
            $table->string('so')->nullable();
            $table->string('sr')->nullable();
            $table->text('distributor')->nullable(); // Multi-select can be stored as JSON or string
            $table->text('super_stokiest')->nullable(); // Multi-select can be stored as JSON or string
            $table->string('emp_code')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
