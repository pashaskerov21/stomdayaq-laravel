<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRegistration extends Model
{
    use HasFactory;
    protected $fillable = ['fullname', 'region', 'address', 'phone', 'card_front', 'card_back', 'destroy'];
}
