<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestingOrderStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'testing_order_id',
        'step_1',
        'step_2',
        'step_3',
        'step_4',
        'created_at',
        'updated_at',
    ];
}
