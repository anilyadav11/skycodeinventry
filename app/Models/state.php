<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    protected $fillable = [
        'region_zone_id',
        'state',
    ];
}
