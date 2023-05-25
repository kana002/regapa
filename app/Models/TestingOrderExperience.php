<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestingOrderExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'testing_order_id',
        'date_start',
        'date_end',
        'org_name',
        'project_name',
        'project_role',
        'exp_stazh_s_uchetom_zagruzki',
        'achievements',
        'created_at',
        'updated_at',
    ];
}
