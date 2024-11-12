<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('region_zone_id');

            // Foreign keys with explicit unsignedBigInteger definition
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('area_id');

            $table->string('customer_type');
            $table->string('supplier')->nullable();
            $table->string('customer_name')->required();
            $table->string('address')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();
            $table->string('GST')->nullable();
            $table->string('PAN')->nullable();
            $table->string('rsm')->nullable();
            $table->string('asm')->nullable();
            $table->string('ase')->nullable();
            $table->string('so')->nullable();
            $table->string('sr')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
