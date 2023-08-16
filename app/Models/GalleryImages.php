<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImages extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'image', 'image_old', 'sort', 'destroy'];
    public function category(){
        return $this->hasOne(GalleryCategory::class, 'id', 'category_id');
    }
}
