<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Status;
use App\Models\Order;
use App\Models\UserDetail;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'surname',
        'name',
        'middlename',
        'region_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('\App\Models\RoleUser');
    }

    public function user_role($id)
    {
        $user_role = \App\Models\RoleUser::where('user_id', $id)->first();
        $role_title = Role::where('id', $user_role->role_id)->value('title');
        return $role_title;
    }

    public function getRole()
    {
        $role = $this->roles()->first()->title ? $this->roles()->first()->title : '';
        return $role;
    }

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'This action is unauthorized.');
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
            }
        } else {
            if ($this->hasRole($roles)) {
            return true;
            }
        }
        return false;
    }
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function order_status()
    {
        return $this->belongsTo(Status::class);
    }

    public function details()
    {
        return $this->hasOne(UserDetail::class);
    }
    
    public function userRole()
    {
        return $this->hasMany(RoleUser::class,  'user_id', 'id');
    }

    public function themes()
    {
        return $this->hasOne(Theme::class,  'reg_id', 'region_id');
    }
   
}
