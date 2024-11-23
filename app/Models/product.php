<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $fillable = ['name', 'description', 'price', 'type', 'image', 'category_id', 'sku', 'tax'];


    public function category()
    {
        return $this->belongsTo(categorie::class);
    }
    public function pricing()
    {
        return $this->hasMany(Product_Pricing::class);
    }
}
