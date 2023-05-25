<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeType extends Model
{
    use HasFactory;


    protected $fillable = [
        'code',
        'name_kz',
        'name_ru',
        'name_en',
    ];
}
