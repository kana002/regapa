<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestingOrderCert extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'testing_order_id',
        'certificate',
        'created_at',
        'updated_at',
    ];
}
