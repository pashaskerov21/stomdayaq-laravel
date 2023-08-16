<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'image', 'image_old', 'sort', 'destroy'];
    public function getName(){
        return $this->hasMany(WorkerTranslate::class, 'worker_id', 'id');
    }
    public function category(){
        return $this->hasOne(WorkerCategory::class, 'id', 'category_id');
    }
}
