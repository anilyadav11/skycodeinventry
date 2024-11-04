<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('u_roles')->insert([
            ['level' => 'Level 1', 'role' => 'Admin', 'description' => 'Administrative'],
            ['level' => 'Level 2', 'role' => 'RSM', 'description' => 'Regional Sales Manager'],
            ['level' => 'Level 3', 'role' => 'ASM', 'description' => 'Area Sales Manager'],
            ['level' => 'Level 4', 'role' => 'ASE', 'description' => 'Area Sales Executive'],
            ['level' => 'Level 5', 'role' => 'SO', 'description' => 'Sales Officer'],
            ['level' => 'Level 6', 'role' => 'SR', 'description' => 'Sales Representative'],
        ]);
    }
}
