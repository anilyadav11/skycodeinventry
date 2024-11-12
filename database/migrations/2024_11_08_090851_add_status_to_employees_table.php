<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToEmployeesTable extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Adding the 'status' column with default value 'active'
            $table->enum('status', ['active', 'inactive'])->default('inactive')->after('emp_code');
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Dropping the 'status' column
            $table->dropColumn('status');
        });
    }
}
