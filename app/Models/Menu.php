<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = ['sort', 'destroy'];
    

    public function getMenu()
    {
        return $this->hasMany('\App\Models\MenuTranslate', 'menu_id', 'id');
    }
}
