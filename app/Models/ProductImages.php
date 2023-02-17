<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image',
    ];

    // fetch related auth data
    public function createdByUserData()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
