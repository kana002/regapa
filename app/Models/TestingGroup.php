<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Test;
use App\Models\TestingGroupOrder;

class TestingGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name',
        'reg_id',
        'test_id',
        'created_at',
        'updated_at',
    ];

    public function test()
    {
        return $this->hasOne(Test::class, 'id', 'test_id');
    }

    public function order()
    {
        return $this->hasMany(TestingGroupOrder::class, 'group_id', 'id');
    }
}
