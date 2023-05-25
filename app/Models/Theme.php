<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ThemeType;

class Theme extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'tema_kz',
        'tema_ru',
        'reg_id',
        'col_chas',
        'date_start',
        'date_end',
        'type',
        'uroven',
    ];


    public function theme_typs()
    {
        return $this->hasOne(ThemeType::class, 'id','type');
        
    }
}
