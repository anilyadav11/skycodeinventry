<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_code',
        'employee_name',
        'user_role_id',
        'phone_no',
        'email',
        'address',
        'region_id',
        'state_id',
        'district_id',
        'area_id',
        'beats',
        'distributors',
        'super_stockists',
        'emp_code',
        'rsm_id',
        'asm_id',
        'ase_id',
        'so_id',
        'se_id',
    ];

    // Relationships
    public function rsm()
    {
        return $this->belongsTo(Employee::class, 'rsm_id');
    }

    public function asm()
    {
        return $this->belongsTo(Employee::class, 'asm_id');
    }

    public function ase()
    {
        return $this->belongsTo(Employee::class, 'ase_id');
    }

    public function so()
    {
        return $this->belongsTo(Employee::class, 'so_id');
    }

    public function se()
    {
        return $this->belongsTo(Employee::class, 'se_id');
    }

    protected $casts = [
        'beats' => 'array',
        'distributors' => 'array',
        'super_stockists' => 'array',
    ];

    public function userRole()
    {
        return $this->belongsTo(URole::class, 'user_role_id');
    }

    // public function region()
    // {
    //     return $this->belongsTo(Region::class, 'region_id');
    // }

    // public function state()
    // {
    //     return $this->belongsTo(Region::class, 'state_id');
    // }

    // public function district()
    // {
    //     return $this->belongsTo(Region::class, 'district_id');
    // }

    // public function area()
    // {
    //     return $this->belongsTo(Region::class, 'area_id');
    // }




    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function region()
    {
        return $this->belongsTo(region_type::class, 'region_id');
    }
}
