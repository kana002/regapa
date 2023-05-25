<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;
use App\Models\Theme;
use App\Models\ThemeType;
use App\Models\JobOrganisation;
use App\Models\JobCategory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'gen',
        'reg_id',
        'surname',
        'name',
        'middlename',
        'gender',
        'iin',
        'vaccine',
        'birth_date',
        'photo',
        'theme_type_id',
        'theme_id',
        'lang_id',
        'study_start_date',
        'study_end_date',
        'student_tel_self',
        'student_tel_job',
        'student_email',
        'student_boss_tel_self',
        'student_boss_tel_job',
        'student_boss_email',
        'student_boss_full_name',
        'kadr_tel',
        'kadr_tel_mob',
        'kadr_email',
        'kadr_full_name',
        'org_who_sent',
        'user_id',
        'reason',
        'status_id',
        'active_year_id',
        'job_org_id',
        'job_category_id',
        'job_position',
        'job_main_funcs',
        'stazh_gos',
        'expectations',
        'ready_order'
    ];

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'theme_id','id');
    }

    public function theme_type()
    {
        return $this->hasOne(ThemeType::class,'id', 'theme_type_id');
    }

    public function job_org()
    {
        return $this->belongsTo(JobOrganisation::class, 'job_org_id','id');
    }

    public function job_cat()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id','id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id','id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

     public function details()
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'user_id');
    }
    public function lang()
    {
        return $this->belongsTo(Lang::class);
    }
}

