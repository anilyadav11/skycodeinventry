<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    protected $fillable = [
        'state_id',
        'district',
    ];
}
