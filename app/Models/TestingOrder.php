<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lang;
use App\Models\Status;
use App\Models\TestCategory;
use App\Models\TestingOrderDoc;
use App\Models\User;

class TestingOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_gen',
        'reg_id',
        'iin',
        'category_id',
        'lang_id',
        'desired_test_date',
        'user_id',
        'reason',
        'status_id',
        'created_at',
        'updated_at',
    ];

    public function test_category()
    {
        return $this->belongsTo(TestCategory::class, 'category_id','id');
    }

    public function test_status()
    {
        return $this->belongsTo(Status::class, 'status_id','id');
    }

    public function lang()
    {
        return $this->belongsTo(Lang::class);
    }

    public function ready_order()
    {
        //return $this->belongsTo(Lang::class);
        return $this->hasOne(TestingOrderDoc::class, 'testing_order_id', 'id');
    }

    public function ready_cert()
    {
        //return $this->belongsTo(Lang::class);
        return $this->hasOne(TestingOrderCert::class, 'testing_order_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    
    public function details()
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'user_id');
    }
   
}
