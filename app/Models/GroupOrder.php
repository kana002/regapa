<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupOrder extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'group_id',
        'order_id',
    ];


   
}
