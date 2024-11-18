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
}
