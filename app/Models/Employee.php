<?php

// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Fillable attributes to allow mass assignment
    protected $fillable = [
        'name',
        'email',
        'phone',
        'designation',
        'empid',
        'salary',
        'doj',
    ];

    // Optionally, if you need to cast any attributes, like salary as decimal and DOJ as date:
    protected $casts = [
        'salary' => 'decimal:2',
        'doj' => 'date',
    ];
}
