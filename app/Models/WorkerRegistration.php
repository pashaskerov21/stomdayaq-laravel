<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerRegistration extends Model
{
    use HasFactory;
    protected $fillable = ['fullname', 'region', 'work_address', 'phone', 'mail', 'image', 'destroy'];
    public function getWorkerArea(){
        return $this->hasMany(WorkerApplicationArea::class, 'worker_id', 'id');
    }
}
