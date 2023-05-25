<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TestCategory;
use App\Models\Lang;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_name',
        'reg_id',
        'test_date',
        'test_lang_id',
        'test_category_type_id',
        'created_at',
        'updated_at',
    ];

    public function lang()
    {
        return $this->belongsTo(Lang::class, 'test_lang_id', 'id');
    }

    public function test_category()
    {
        return $this->belongsTo(TestCategory::class, 'test_category_type_id', 'id');

    }

}
