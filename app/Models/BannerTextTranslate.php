<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerTextTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['banner_id', 'text', 'lang'];
}
