<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_zone',
        'state',
        'district',
        'area',
        'bzone',
        'latitude',
        'longitude',
    ];

    // Define any relationships if needed (e.g., with other models)
}
