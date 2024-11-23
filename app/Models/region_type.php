<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class region_type extends Model
{
    protected $fillable = [
        'region_zone',
    ];

    public function states()
    {
        return $this->hasMany(State::class, 'region_zone_id');
    }
}
