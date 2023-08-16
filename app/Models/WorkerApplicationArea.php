<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerApplicationArea extends Model
{
    use HasFactory;
    protected $fillable = ['worker_id', 'area_id'];

    public function getArea(){
        return $this->hasMany(ApplicationArea::class, 'id', 'area_id');
    }
}
