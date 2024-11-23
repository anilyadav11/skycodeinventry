<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_pricing extends Model
{
    protected $fillable = ['product_id', 'unit_type', 'type', 'customer_type', 'price'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
