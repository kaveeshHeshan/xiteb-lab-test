<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'is_active',
    ];

    // Category Image Data
    public function categoryImage()
    {
        if (!is_null($this->image)) {
            $imageUrl = asset('/storage/category/'.$this->image);
        } else {
            $imageUrl = asset('/img/system_default/default-image-placeholder.jpg');
        }
        
        return $imageUrl;
    }
}
