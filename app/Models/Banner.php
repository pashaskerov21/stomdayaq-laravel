<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'image_old', 'content_status', 'sort', 'destroy'];
    public function getTexts(){
        return $this->hasMany(BannerTextTranslate::class, 'banner_id', 'id');
    }
}
