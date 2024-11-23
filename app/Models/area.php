<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    protected $fillable = [
        'district_id',
        'area',
        'bzone',
        'latitude',
        'longitude',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'area_id');
    }
}
