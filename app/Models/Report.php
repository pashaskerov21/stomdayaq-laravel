<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = ['count_value', 'image', 'image_old', 'sort', 'destroy'];
    public function getTitle(){
        return $this->hasMany(ReportTranslate::class, 'report_id', 'id');
    }
}
