<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class outlate extends Model
{
    protected $fillable = [
        'region_id',
        'state_id',
        'district_id',
        'area_id',
        'user_role',
        'doj',
        'emp_role',
        'emp_name',
        'emp_status',
        'emp_inactive',
        'ss_side',
        'ss_name',
        'distributor_code',
        'distributor_name',
        'beat_name',
        'outlate_type',
        'outlate_name',
        'outlate_address',
        'outlate_contact_person_name',
        'outlate_contact_person_number',
        'outlate_status',
        'dat_of_activation',
        'dat_of_deactivation'
    ];
    public function state()
    {
        return $this->belongsTo(state::class, 'state_id');
    }

    // Define the relationship to fetch district
    public function district()
    {
        return $this->belongsTo(district::class, 'district_id');
    }
    public function area()
    {
        return $this->belongsTo(area::class, 'area');
    }
}
