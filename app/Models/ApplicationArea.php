<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationArea extends Model
{
    use HasFactory;
    protected $fillable = ['sort', 'destroy'];
    public function getName(){
        return $this->hasMany(ApplicationAreaTranslate::class, 'area_id', 'id');
    }
}
