<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerCategoryTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'lang'];
}
