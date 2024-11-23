<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    protected $fillable = [
        'state_id',
        'district',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }
}
