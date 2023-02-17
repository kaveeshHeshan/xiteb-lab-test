<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id',
        'name',
        'description',
        'price',
    ];

    public function coverImage()
    {
        // Takes first Image as cover image
        return $this->hasOne('App\Models\ProductImages', 'product_id', 'id')->oldestOfMany()->select('image');

    }

    // Category Image Data
    public function otherProductImages()
    {
        return $this->hasMany('App\Models\ProductImages', 'product_id', 'id')->select('id', 'image');
    }
}
