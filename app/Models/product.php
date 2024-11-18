<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $fillable = ['name', 'description', 'price', 'image', 'category_id', 'sku', 'tax'];


    public function category()
    {
        return $this->belongsTo(categorie::class);
    }
}
