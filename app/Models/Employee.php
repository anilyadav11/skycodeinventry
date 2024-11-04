<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_code',
        'emp_name',
        'user_role_id',
        'phone_no',
        'email',
        'address',
        'region_id',
        'state',
        'district',
        'area',
        'beat',
        'rsm',
        'asm',
        'ase',
        'so',
        'sr',
        'distributor',
        'super_stokiest',
        'emp_code',
    ];
    // Define the relationship with UserRole
    public function userRole()
    {
        return $this->belongsTo(URole::class, 'user_role_id');
    }
}
