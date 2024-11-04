<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class URole extends Model
{
    // Specify the table if it does not follow Laravel's naming convention
    protected $table = 'u_roles';

    // Define fillable attributes for mass assignment
    protected $fillable = [
        'level',        // e.g., Level 1
        'role',         // e.g., Admin
        'description',  // e.g., Administrative
    ];

    // If you want to allow all attributes to be mass assignable, you can use:
    // protected $guarded = [];
    public function employees()
    {
        return $this->hasMany(Employee::class, 'user_role_id');
    }
}
