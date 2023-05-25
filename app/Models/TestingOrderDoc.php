<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TestingOrder;

class TestingOrderDoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'testing_order_id',
        'udost',
        'education',
        'exp_spravka',
        'exp_spravka_signed',
        'ready_order',
        'payment_receipt',
        'created_at',
        'updated_at',
    ];



}
