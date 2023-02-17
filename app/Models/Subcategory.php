<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'image',
        'is_active',
    ];

    // Subcategory Image Data
    public function subcategoryImage()
    {
        if (!is_null($this->image)) {
            $imageUrl = asset('/storage/subcategory/'.$this->image);
        } else {
            $imageUrl = asset('/img/system_default/default-image-placeholder.jpg');
        }
        
        return $imageUrl;
    }
}
