<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RSM extends Model
{
    protected $table = 'rsms'; // Specify the exact table name

    protected $fillable = [
        'user_id',
        'emp_name',
        'user_role',
        'phone_no',
        'address',
        'region',
        'email',
        'password'
    ];
}
