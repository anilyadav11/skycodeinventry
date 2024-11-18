<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_zone_id',
        'state_id',
        'district_id',
        'area_id',
        'customer_type',
        'supplier',
        'customer_name',
        'address',
        'owner_name',
        'phone_no',
        'email',
        'GST',
        'PAN',
        'rsm',
        'asm',
        'ase',
        'so',
        'sr',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_zone_id');
    }

    public function customertype()
    {
        return $this->belongsTo(CustomerType::class);
    }
}
