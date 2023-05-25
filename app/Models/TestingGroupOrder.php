<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestingGroupOrder extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'group_id',
        'testing_order_id',
    ];
}
