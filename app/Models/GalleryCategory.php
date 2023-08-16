<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use HasFactory;
    protected $fillable = ['sort', 'destroy'];
    public function getName(){
        return $this->hasMany(GalleryCategoryTranslate::class, 'category_id', 'id');
    }
}
