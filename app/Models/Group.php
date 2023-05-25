<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Theme;
use App\Models\GroupOrder;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name',
        'reg_id',
        'theme_id',
        'created_at',
        'updated_at',
    ];

    public function theme()
    {
        return $this->hasOne(Theme::class, 'id', 'theme_id');
    }

    public function group_orders()
    {
        return $this->hasMany(GroupOrder::class, 'group_id', 'id');
    }
}
