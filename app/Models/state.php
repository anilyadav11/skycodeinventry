<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    protected $fillable = [
        'region_zone_id',
        'state',
    ];

    public function region()
    {
        return $this->belongsTo(region_type::class, 'region_zone_id');
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
