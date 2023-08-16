<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerCategory extends Model
{
    use HasFactory;
    protected $fillable = ['sort', 'destroy'];
    public function getName(){
        return $this->hasMany(WorkerCategoryTranslate::class, 'category_id', 'id');
    }
}
