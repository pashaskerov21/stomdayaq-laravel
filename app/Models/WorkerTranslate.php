<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerTranslate extends Model
{
    use HasFactory;
    protected $fillable = ['worker_id', 'name', 'lang'];
}
