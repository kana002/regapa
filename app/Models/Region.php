<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;


class Region extends Model
{
    use HasFactory;

    
    protected $fillable = [
      
        'id',
        'name_kz',
        'name_ru',
        'name_en',
             
    ];
}
