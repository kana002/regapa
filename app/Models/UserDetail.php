<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'avatar',
        'birthday',
        'gender',
        'iin',
        'mobile_phone',
        'work_phone',
        'living_address',
        'job_org',
        'job_position',
        'stazh_gos',
        'stazh_project_man',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
