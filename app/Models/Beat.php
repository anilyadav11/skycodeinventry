<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beat extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_zone_id',
        'state_id',
        'district_id',
        'area',
        'beat_1',
        'beat_2',
        'beat_3',
        'beat_4',
        'beat_5',
        'beat_6',
        'beat_7',
        'beat_8',
        'beat_9',
        'beat_10',
        'beat_11',
        'beat_12',
        'emp_role_id',
        'customer_type',
        'customer_name',
    ];
    // public function state()
    // {
    //     return $this->belongsTo(Region::class, 'state_id');
    // }

    // Define the relationship to fetch district
    // public function district()
    // {
    //     return $this->belongsTo(Region::class, 'district_id');
    // }
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
