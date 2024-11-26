<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'unit',
        'price',
        'total_price',
        'zone_id',
        'state_id',
        'district_id',
        'area_id',
        'sept_month_opening_stock',
        'sept_primary_order',
        'sept_month_closing_stock',
        'sept_secondary',
        'tdp1_opening_stock',
        'tdp1_primary_order',
        'tdp1_month_closing_stock',
        'tdp1_secondary',
        'tdp2_opening_stock',
        'tdp2_primary_order',
        'tdp2_month_closing_stock',
        'tdp2_secondary',
        'tdp3_opening_stock',
        'tdp3_primary_order',
        'tdp3_month_closing_stock',
        'tdp3_secondary'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
